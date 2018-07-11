<?php

namespace App\Http\Controllers;

use App\Business\SearchServiceBusiness;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class SearchServiceController extends Controller 
{

    private $_searchServiceBusiness;

    public function __construct(SearchServiceBusiness $searchServiceBusiness) 
    {
        $this->_searchServiceBusiness = $searchServiceBusiness;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        try {
            
            $shipId = $request->get('shipId');
            $currencyId = $request->get('currencyId');

            return $this->_searchServiceBusiness->initSearchSevice($currencyId, $shipId);
            
        } catch (Exception $ex) {
            Log::info($ex);
        }
    }
    
    /**
     * Search a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request) 
    {
        try {
            
            $shipId = $request->get('shipId');
            $currencyId = $request->get('currencyId');
            $idServiceSearch = $request->get('idServiceSearch');
            $nameServiceSearch = $request->get('nameServiceSearch');
            
            return $this->_searchServiceBusiness->searchSevice($currencyId, $shipId, $idServiceSearch , $nameServiceSearch);
            
        } catch (Exception $ex) {
            dd($ex);
            Log::info($ex);
        }
    }
}
