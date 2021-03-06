<?php

/**
 * File company repository
 *
 * Handle eloquent query builder company
 * @package App\Repositories\Company
 * @author Rikkei.trihnm
 * @date 2018/06/19
 */

namespace App\Repositories\Company;

use App\Repositories\EloquentRepository;
use App\Models\MCompany;
use App\Common\Constant;
use DB;

class CompanyRepository extends EloquentRepository implements CompanyInterface
{
    /**
     * Function get path model
     * @access public
     * @return string model
     */
    public function getModel()
    {
        return MCompany::class;
    }

    /**
     * Function get list company common
     * @access public
     * @param int groupType company = 0/ service = 1
     * @param int $showType select company have contract active and not have contrct active
     * @return mixed
     */
    public function getListCompanyCommon($groupType = 0, $showType = Constant::SHOW_ACTIVE)
    {
        // Check group type and set subquery for count total license
        if (!$groupType) {
            $subQuery = ($showType == Constant::SHOW_ACTIVE)
                ? '(select count(contract.id) as count , company.id
                    FROM m_company as company
                    JOIN m_ship as ship ON ship.company_id = company.id
                    JOIN m_contract as contract ON ship.id = contract.ship_id
                    WHERE contract.status = 0 AND ship.del_flag = 0 AND company.del_flag = 0
                        AND (contract.approved_flag = 1
                            OR (contract.approved_flag IN (2, 3) AND contract.updated_at IS NOT NULL)
                        )
                    group by company.id
                ) as sumTotalLicense'
                : '(select count(contract.id) as count , company.id
                    FROM m_company as company
                    JOIN m_ship as ship ON ship.company_id = company.id
                    JOIN m_contract as contract ON ship.id = contract.ship_id
                    WHERE ship.del_flag = 0 AND company.del_flag = 0
                    GROUP BY company.id
                ) as sumTotalLicense' ;
        } else {
            $subQuery = ($showType == Constant::SHOW_ACTIVE)
                ? '(select count(service.id) as count , service.id
                    FROM m_company as company
                    JOIN m_ship as ship ON ship.company_id = company.id
                    JOIN m_contract as contract ON ship.id = contract.ship_id
                    JOIN m_service as service on service.id = contract.service_id
                    WHERE contract.status = 0 AND ship.del_flag = 0 AND company.del_flag = 0
                        AND (contract.approved_flag = 1
                            OR (contract.approved_flag IN (2, 3) AND contract.updated_at IS NOT NULL)
                        )
                    GROUP BY service.id
                ) as sumTotalLicense'
                : '(select count(service.id) as count , service.id
                    FROM m_company as company
                    JOIN m_ship as ship ON ship.company_id = company.id
                    JOIN m_contract as contract ON ship.id = contract.ship_id
                    JOIN m_service as service on service.id = contract.service_id
                    WHERE ship.del_flag = 0 AND company.del_flag = 0
                    GROUP BY service.id
                ) as sumTotalLicense';
        }

        return $this->select([
                'm_company.id',
                'm_company.name_jp',
                'm_company.name_en',
                'm_company.head_office_address',
                'm_company_operation.name as ope_company_name',
                'm_company.ope_person_name_1',
                'm_company.ope_email_1',
                'm_company.ope_phone_1',
                'm_company.ope_person_name_2',
                'm_company.ope_email_2',
                'm_company.ope_phone_2',
                'm_service.name_jp as service_name_jp',
                'm_service.name_en as service_name_en',
                \DB::raw('COUNT(m_service.id) as license'),
                'm_service.id as service_id',
                'm_nation.name_jp as nation_jp',
                'm_nation.name_en as nation_en',
                'sumTotalLicense.count as total_license'
            ])
            ->join('m_company_operation', 'm_company.ope_company_id', 'm_company_operation.id')
            ->join('m_nation', 'm_nation.id', 'm_company.nation_id')
            ->join('m_ship','m_ship.company_id', 'm_company.id')
            ->_joinWithShowType($subQuery, $groupType, $showType)
            ->where('m_nation.del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('m_ship.del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('m_company.del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('m_company_operation.del_flag', Constant::DELETE_FLAG_FALSE);
    }

    /**
     * Function join with condition show company have contract active or not active
     *
     * @param string $subQuery
     * @param integer $groupType
     * @param integer $showType
     * @return void
     */
    private function _joinWithShowType($subQuery, $groupType = 0, $showType = Constant::SHOW_ACTIVE)
    {
        if ($showType == Constant::SHOW_ACTIVE) {
            return $this->join('m_contract', 'm_ship.id', 'm_contract.ship_id')
                ->join('m_service', 'm_contract.service_id', 'm_service.id')
                ->join(\DB::raw($subQuery), function($join) use ($groupType) {
                    $join->on('sumTotalLicense.id', '=', $groupType ? 'm_service.id' : 'm_company.id');
                })
                ->where('m_contract.status', Constant::STATUS_CONTRACT_ACTIVE)
                ->where(function ($query) {
                    return $query->where('m_contract.approved_flag', 1)
                        ->orWhere(function ($sub) {
                            return $sub->whereIn('m_contract.approved_flag', [Constant::STATUS_WAITING_APPROVE, Constant::STATUS_REJECT_APPROVE])
                                ->whereNotNull('m_contract.updated_at');
                        });
                });
        }

        return $this->leftJoin('m_contract', 'm_ship.id', 'm_contract.ship_id')
            ->leftJoin('m_service', function ($join) {
                $join->on( 'm_contract.service_id', 'm_service.id')
                    ->where('m_service.del_flag', Constant::DELETE_FLAG_FALSE);
            })
            ->leftJoin(\DB::raw($subQuery), function($join) use ($groupType) {
                $join->on('sumTotalLicense.id', '=', $groupType ? 'm_service.id' : 'm_company.id');
            })
            ->where(function ($query) {
                return $query->where(function ($query) {
                        return $query->whereNull('sumTotalLicense.count')->whereNull('m_contract.service_id');
                    })
                    ->orWhere(function ($query) {
                        return $query->whereNotNull('sumTotalLicense.count')->whereNotNull('m_contract.service_id');
                    });
            });
    }

    /**
     * Function make condition for search company
     * @access public
     * @param array param
     * @return mixed
     */
    public function conditionSearchCompany($param)
    {
        return $this->where(function ($query) use ($param) {
                if ($param['filter-company']) {
                    return $query->where('m_company.name_jp', 'LIKE', '%' . $param['filter-company'] . '%')
                        ->orWhere('m_company.name_en', 'LIKE', '%' . $param['filter-company'] . '%');
                }
            })
            ->where(function ($query) use ($param) {
                return $query->where('m_nation.name_jp', 'LIKE', '%' .$param['filter-nation'] . '%')
                    ->orWhere('m_nation.name_en', 'LIKE', '%' . $param['filter-nation'] . '%');
            })
            ->where(function ($query) use ($param) {
                if ($param['filter-address']) {
                    return $query->where('m_company.head_office_address', 'LIKE', '%' . $param['filter-address'] . '%');
                }
            })
            ->where('m_company_operation.name', 'LIKE', '%' . $param['filter-company-operation'] . '%')
            ->where('m_company.ope_person_name_1', 'LIKE', '%' . $param['filter-company-ope-person-name-1'] . '%')
            ->where('m_company.ope_email_1', 'LIKE', '%' . $param['filter-company-ope-person-email-1'] . '%')
            ->where(function ($query) use ($param) {
                if ($param['filter-company-ope-person-phone-1']) {
                    return $query->where('m_company.ope_phone_1', 'LIKE', '%' . $param['filter-company-ope-person-phone-1'] . '%');
                }
            })
            ->where(function ($query) use ($param) {
                if ($param['filter-company-ope-person-name-2']) {
                    return $query->where('m_company.ope_person_name_2', 'LIKE', '%' . $param['filter-company-ope-person-name-2'] . '%');
                }
            })
            ->where(function ($query) use ($param) {
                if ($param['filter-company-ope-person-email-2']) {
                    return $query->where('m_company.ope_email_2', 'LIKE', '%' . $param['filter-company-ope-person-email-2'] . '%');
                }
            })
            ->where(function ($query) use ($param) {
                if ($param['filter-company-ope-person-phone-2']) {
                    return $query->where('m_company.ope_phone_2', 'LIKE', '%' . $param['filter-company-ope-person-phone-2'] . '%');
                }
            })
            ->where(function ($query) use ($param) {
                if ($param['filter-service']) {
                    return $query->where('m_service.name_jp', 'LIKE', '%' . $param['filter-service'] . '%')
                        ->orWhere('m_service.name_en', 'LIKE', '%' . $param['filter-service'] . '%');
                }
            });
    }

    /**
     * Function get detail group company/ service
     * @access public
     * @param int id
     * @param int type group detail company = 0/ group detail service = 1
     * @return Collection
     */
    public function getDetailByGroup($id, $type = 0)
    {
        return $this->select([
                'm_company.id as company_id',
                'm_company.name_jp as company_jp',
                'm_company.name_en as company_en',
                'm_service.id as service_id',
                'm_service.name_jp as service_jp',
                'm_service.name_en as service_en',
                'm_ship.name as ship_name',
                'm_contract.start_date as contract_start_date',
                'm_contract.status as contract_status',
                'm_contract.approved_flag as contract_approve',
            ])
            ->join('m_ship', 'm_ship.company_id', 'm_company.id')
            ->join('m_contract', 'm_ship.id', 'm_contract.ship_id')
            ->join('m_service', 'm_service.id', 'm_contract.service_id')
            ->where(!$type ? 'm_company.id' : 'm_service.id', $id)
            ->where('m_service.del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('m_ship.del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('m_company.del_flag', Constant::DELETE_FLAG_FALSE)
            ->groupBy([
                !$type ? 'm_service.id' : 'm_company.id',
                'm_ship.id',
            ])
            ->get();
    }

    /**
     * Function check exits currency by currency id
     * @access public
     * @param int $currencyId
     * @return boolean
    */
    public function checkExits($currencyId) {
        return $this->where('currency_id', $currencyId)->exists();
    }

    /** Function get detail company by id
     * @param int id
     * @param array columns
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return Model
     */
    public function getDetailCompanyWithRelation($id, $columns = ['*'])
    {
        $company = $this
            ->join('m_nation', function ($join) {
                $join->on('m_nation.id', 'm_company.nation_id')
                    ->where('m_nation.del_flag', Constant::DELETE_FLAG_FALSE);
            })
            ->join('m_company_operation', function ($join) {
                $join->on('m_company_operation.id', 'm_company.ope_company_id')
                    ->where('m_company_operation.del_flag', Constant::DELETE_FLAG_FALSE);
            })
            ->join('m_billing_method', function ($join) {
                $join->on('m_billing_method.id', 'm_company.billing_method_id')
                    ->where('m_billing_method.del_flag', Constant::DELETE_FLAG_FALSE);
            })
            ->join('m_currency', function ($join) {
                $join->on('m_currency.id', 'm_company.currency_id')
                    ->where('m_currency.del_flag', Constant::DELETE_FLAG_FALSE);
            })
            ->where('m_company.del_flag', Constant::DELETE_FLAG_FALSE)
            ->findOrFail($id, $columns);

        return $company;
    }

    /**
     * Function company currency id
     * @param int companyId
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return array
     */
    public function getCompanyCurrencyId($companyId)
    {
        return $this->findOrFail($companyId, ['currency_id'])->toArray();
    }

    /**
     * Function update currency company
     * @param int companyId
     * @param int currencyId
     * @return bool|mixed
     */
    public function updateCompanyBillingMethod($companyId, $billingMethodId)
    {
        // Update billing method when del_flag = 0
        return $this->where('del_flag', Constant::DELETE_FLAG_FALSE)
            ->multiUpdate($companyId, ['billing_method_id' => $billingMethodId]);
    }

    /**
     * Function check exists contract in company watting for approved
     * @param int companyId
     * @return boolean
     */
    public function existsContractWattingApprove($companyId)
    {
        // Select all contract in company have approved_flag = 2 and updated_at not null
        return $this->select(['m_contract.id'])
            ->join('m_ship', function ($join) use ($companyId) {
                $join->on('m_ship.company_id', 'm_company.id')
                    ->where('m_ship.company_id', $companyId);
            })
            ->join('m_contract', 'm_contract.ship_id', 'm_ship.id')
            ->where('m_contract.approved_flag', Constant::STATUS_WAITING_APPROVE)
            ->whereNotNull('m_contract.updated_at')
            ->exists();
    }

    /**
     * Function check exists company
     *
     * @param int $companyId
     * @return boolean
     */
    public function checkCompanyExists($companyId)
    {
        return $this->where('id', $companyId)->where('del_flag', Constant::DELETE_FLAG_FALSE)->exists();
    }

    /**
     * Function get company
     *
     * @param int $companyId
     * @param array $columns
     * @throws Exception
     * @return App\Models\MCompany
     */
    public function getCompanyDetail($companyId, $columns = ['*'])
    {
        return $this->where('del_flag', Constant::DELETE_FLAG_FALSE)
            ->findOrFail($companyId, $columns);
    }

    /**
     * Get info company base on ship or contract
     *
     * @param array $condition
     * @return App\Models\MCompany
     */
    public function getCompanyByShipOrContract($condition = [])
    {
        $query = DB::table('m_company')
                ->join('m_ship', function($join){
                    $join->on('m_company.id', '=', 'm_ship.company_id')
                            ->where('m_ship.del_flag', Constant::DELETE_FLAG_FALSE);
                })
                ->leftJoin('m_contract', function($join){
                    $join->on('m_ship.id', '=', 'm_contract.ship_id');
                })
                ->where('m_company.del_flag', Constant::DELETE_FLAG_FALSE);

                // Check if user filter by company id
                if (isset($condition['companyId']) && !is_null($condition['companyId']) && count($condition['companyId']) > 0) {
                    $query = $query->whereIn('m_company.id', $condition['companyId']);
                    unset($condition['companyId']);
                }

                // Check if user filter by ship id
                if (isset($condition['shipId']) && !is_null($condition['shipId']) && count($condition['shipId']) > 0) {
                    $query = $query->whereIn('m_ship.id', $condition['shipId']);
                    unset($condition['shipId']);
                }

                // Check if user filter by contract id
                if (isset($condition['contractId']) && !is_null($condition['contractId']) && count($condition['contractId']) > 0) {
                    $query = $query->whereIn('m_contract.id', $condition['contractId']);
                    unset($condition['contractId']);
                }

                // Check if user filter by ship id
                if (isset($condition['contractStatus']) && !is_null($condition['contractStatus']) && count($condition['contractStatus']) > 0) {
                    $query = $query->whereIn('m_contract.status', $condition['contractStatus']);
                    unset($condition['contractStatus']);
                }

                if (count($condition) > 0) {
                    $query = $query->where($condition);
                }

                $query = $query->select([
                    'm_company.id as company_id',
                    'm_company.currency_id as currency_id',
                    'm_contract.id as contract_id',
                    'm_ship.id as ship_id',
                ]);
                return $query->get();
    }

    /**
     * Function check name company is exists
     *
     * @param string $name
     * @param integer $type
     * @return boolean
     */
    public function existsNameCompany($name, $type = 0)
    {
        return $this->where(function ($query) use ($name, $type) {
                if (!$type) {
                    return $query->where('name_jp', $name);
                }

                return $query->where('name_en', $name);
            })
            ->where('del_flag', Constant::DELETE_FLAG_FALSE)
            ->exists();
    }

    /**
     * Function check name company is exists when update
     *
     * @param integer $idCompany
     * @param string $name
     * @param boolean $type
     * @return boolean
     */
    public function checkExistsNameUpdate($idCompany, $name, $type = false)
    {
        return $this->where(function ($query) use ($name, $type) {
                if (!$type) {
                    return $query->where('name_jp', $name);
                }

                return $query->where('name_en', $name);
            })
            ->where('del_flag', Constant::DELETE_FLAG_FALSE)
            ->where('id', '<>', $idCompany)
            ->exists();
    }

    /**
     * Function check company is using service
     *
     * @param integer $companyId
     * @return boolean
     */
    public function checkCompanyHasUsingService($companyId)
    {
        return $this->select(['m_contract.id'])
            ->join('m_ship', 'm_ship.company_id', 'm_company.id')
            ->join('m_contract', 'm_contract.ship_id', 'm_ship.id')
            ->where('m_company.id', $companyId)
            ->where('m_company.del_flag', Constant::DELETE_FLAG_FALSE)
            ->exists();
    }
}
