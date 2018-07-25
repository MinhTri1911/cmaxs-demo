<?php

/**
 * Ship management Controller
 *
 * @package App\Http\Controllers
 * @author Rikkei.QuyenL
 * @date 2018/07/05
 */

namespace App\Http\Controllers;

use Exception;
use App\Common\Constant;
use App\Business\ShipBusiness;
use App\Http\Requests\ShipRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ShipController CM_DD_SMB0001 ship management
 */
class ShipController extends Controller
{
    // Call roles trait to handel check permission
    use RolesController;

    /**
     * @var ShipBusiness
     */
    private $_shipBusiness;

    /**
     * ShipController constructor
     *
     * @param ShipBusiness $shipBusiness
     * @access public
     * @return void
     */
    public function __construct(ShipBusiness $shipBusiness)
    {
        $this->_shipBusiness = $shipBusiness;
    }

    /**
     * CM_DD_SMB0001 show list ship
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        // Check permission
        $this->checkPermission(Constant::ALLOW_SHIP_VIEW, Constant::IS_CHECK_SCREEN);

        // Get sort request data
        $data = [
            'companyId' => $request->get('company-id'), // Company id
            'field' => $request->get('field'), // Request sort field
            'orderBy' => $request->get('orderBy'), // Request sort is DESC or ASC
            'perPage' => $request->get('load') // Load total record per page
        ];

        // Handle and get list ship data
        $shipData = $this->_shipBusiness->getListShip($data['field'], $data['perPage'], $data['orderBy'], $data['companyId']);

        // Check ajax request
        if ($request->ajax()) {
            return response()->json([
                'code' => Constant::HTTP_CODE_SUCCESS,
                // Send list ship table data to view
                'table' => view('ship.component.list.table-data', ['ships' => $shipData]
                )->render(),
                'paginate' => view('ship.component.paginate', [
                    'pagination' => $shipData,
                    'url' => route('ship.index') . '?page=',
                    'companyId' => $data['companyId'],
                ])->render(),
                'perPage' => $request->get('load'),
            ]);
        }

        // Create view data
        $viewData = [
            'ships' => $shipData,
            'url' => route('ship.index') . '?page=',
            'companyId' => $data['companyId'],
            // Get back button route and send to view
            'backButton' => !$request->has('company-id')
                ? route('company.index')
                : route('company.show', ['id' => $data['companyId']])
        ];
        return view('ship.list', $viewData);
    }

    /**
     * Filter list ship by column and load filter result
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function filterShip(Request $request)
    {
        // Check ajax error request
        if (!$request->ajax()) {
            return response()->json(['code' => Constant::HTTP_CODE_ERROR_500]);
        }

        // Get data for filter
        $filters = $request->only([
            'filter-ship-name',
            'filter-company',
            'filter-classification',
            'filter-ship-type',
            'filter-imo-number',
            'filter-ship-nation',
            'filter-service-name'
        ]);

        // Set data field column to order by
        $filters['field'] = $request->get('field');
        // Set data order by
        $filters['orderBy'] = $request->get('orderBy');
        // Set data load result
        $filters['load'] = $request->get('load');
        // Get company id from filter ajax request
        $filters['companyId'] = $request->get('company-id');

        // Get data filter company
        $ships = $this->_shipBusiness->filterCompany(
            $filters, // Conditions filter
            $filters['load'], // Record per page
            [
                'field' => $filters['field'], // Filter column
                'orderBy' =>  $filters['orderBy'], // Sort type
            ],
            $filters['companyId'] // Filter by company id
        );

        // Check total record per page, if it not have set default it
        if (!in_array($filters['load'], Constant::ARY_PAGINATION_PER_PAGE)) {
            $data['load'] = Constant::PAGINATION_PER_PAGE;
        }

        // Render data result after filter
        $viewData = view('ship.component.list.table-data', ['ships' => $ships])
            ->render();

        // Render data pagination after filter
        $paginationView = view('ship.component.paginate',
            [
                'pagination' => $ships,
                'url' => route('ship.filter', $filters) . '&page=',
                'companyId' => $filters['companyId'],
            ]
        )->render();

        return response()->json([
            'code' => Constant::HTTP_CODE_SUCCESS,
            'table' => $viewData,
            'paginate' => $paginationView,
        ]);
    }

    /**
     * Show create ship view
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCreate(Request $request)
    {
        // Initial create ship view data
        $companyId = $request->get('company-id');
        $viewData = $this->_shipBusiness->getViewData($companyId);

        return view('ship.create', compact('viewData'));
    }

    /**
     * Create ship
     *
     * @param ShipRequest $request
     * @return mixed
     */
    public function create(ShipRequest $request)
    {
        // Get validated request data
        $validatedData = $request->validated();

        try {
            // Begin transaction
            DB::beginTransaction();

            // Insert ship
            $this->_shipBusiness->createShip($validatedData);

            // Commit a transaction via the commit method
            DB::commit();

            // Redirect to list ship screen
            return redirect()->route('ship.index');

        } catch (Exception $e) {
            // Rollback the transaction
            DB::rollBack();

            // Redirect error page
            return abort(Constant::HTTP_CODE_ERROR_500, Constant::ID_SCREEN['SMB0008']);
        }
    }

    /**
     * Show form edit Ship
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id = '')
    {
        return view('ship.edit');
    }
}
