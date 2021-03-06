<?php

/**
 * ShipContractController.php
 *
 * Handle business and logic ship and contract data
 *
 * @package    ShipContract
 * @author     Rikkei.DungLV
 * @date       2018/07/03
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business\ShipContractBusiness;
use Exception;
use App\Common\Constant;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ShipContractRequest;

class ShipContractController extends Controller
{
    // Business ship contract
    private $_shipContractBusiness;

    // Set default number record per page
    const N_RECORD_PAGE = 10;

    /**
     * Constructor dependency inject dependency to controller
     *
     * @access public
     * @param App\Business\ShipContractBusiness $shipContractBusiness
     * @return Object
     */
    public function __construct(ShipContractBusiness $shipContractBusiness)
    {
        $this->_shipContractBusiness = $shipContractBusiness;
    }

    /**
     * Show detail ship and anything  realted to ship, eg contract, spot, etc...
     *
     * @access public
     * @param integer $id
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\View
     */
    public function detail($id = '', Request $request)
    {
        try {
            // Ship detail get from business
            $ship = $this->_shipContractBusiness->getShipContractById($id, $request);

            // If ship not exists, show not found page
            if (is_null($ship->detail_ship) || empty($ship->detail_ship)) {
                return view('exception.notfound');
            }

            return view('ship.contract.detail')->with('ship', $ship);
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine().'\n'.$exc->getMessage());
            abort(Constant::HTTP_CODE_ERROR_500);
        }
    }

    /**
     * Restore contract of a ship
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Respons Response ajax
     */
    public function restoreContract(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->restoreContract($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Disable contract from ajax request
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Respons Response ajax
     */
    public function disableContract(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->disableContract($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Delete contract from request ajax.
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Response
     */
    public function deleteContract(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->deleteContract($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Delete spot from ajax request
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Response
     */
    public function deleteSpot(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->deleteSpot($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Show reason reject of request approved
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Response
     */
    public function getReasonReject(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->getReasonReject($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Delete ship from request ajax
     *
     * @access public
     * @param Illuminate\Support\Facades\Request $request
     * @return Illuminate\Support\Facades\Response
     */
    public function deleteShip(Request $request)
    {
        try {
            return response()->json($this->_shipContractBusiness->deleteShip($request));
        } catch (Exception $exc) {
            Log::error($exc->getFile() .' on '. $exc->getLine());
            abort(Constant::HTTP_CODE_ERROR_500, $exc->getMessage());
        }
    }

    /**
     * Show page create ship contract
     * @param Illuminate\Support\Facades\Request request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (!$request->get('company-id') || !is_numeric($request->get('company-id'))) {
            abort(404);
        }

        if (!$request->get('currency-id') || !is_numeric($request->get('currency-id'))) {
            abort(404);
        }

        try {
            $data = $this->_shipContractBusiness->initCreateShipContract($request->get('company-id'));
        } catch (\Exception $e) {
            abort(404);
        }

        return view('ship.create-ship-contract', [
            'company' => $data['company'],
            'shipTypes' => $data['shipTypes'],
            'classificationies' => $data['classificationies'],
            'nations' => $data['nations'],
            'companyId' => $request->get('company-id'),
            'services' => $data['services'],
            'currencyId' => $request->get('currency-id'),
            'spotDefault' => $data['spotDefault'],
        ]);
    }

    /**
     * Function store ship contract
     * @param Request $request
     */
    public function store(ShipContractRequest $request)
    {
        $dataShip = $request->only(
            'company-id',
            'currency-id',
            'txt-ship-name',
            'txt-imo-number',
            'txt-mmsi-number',
            'nation-id',
            'slb-classification',
            'txt-register-number',
            'slb-ship-type',
            'txt-ship-width',
            'txt-ship-length',
            'txt-water-draft',
            'txt-total-weight-ton',
            'txt-weight-ton',
            'txt-member-number',
            'txt-remark',
            'txt-url-1',
            'txt-url-2',
            'txt-url-3'
        );

        $dataContract = $request->only('service', 'currency-id');
        $dataSpot = $request->only('spot', 'currency-id');
        $status = true;

        \DB::beginTransaction();
        try {
            $this->_shipContractBusiness->storeShipContractWithSpot($dataShip, $dataContract, $dataSpot);
            \DB::commit();
            $message = trans('common-message.inform.I033');
        } catch (\Exception $e) {
            \DB::rollback();

            $status = false;
            $message = trans('common-message.inform.I034');
        }

        return redirect()->route('company.show', $request->get('company-id'))->with($status ? 'success' : 'error', $message);
    }
}
