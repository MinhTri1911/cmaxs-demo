 <h4 class="rs-title">{{__('approve.header_contract')}}</h4>
<div class="content-block table-block">
    <div class="extra-block">
        <div class="pull-left lbl-page-text">{{__('approve.lbl_page_text', ['total' => $datas->total()])}}</div>
        <div class="limit-block pull-right">
            <span class="lbl_limit">{{__('ship-contract.detail.lbl_limit')}}</span>
            <div class="custom-select" style="min-width:100px">
                {{ Form::select('limit_page', \App\Common\Constant::ARY_PAGINATION_PER_PAGE, request()->filled('limit')?request()->get('limit'):null, ['class' => count($datas) > 0?'form-control limit-page':'form-control', 'tabindex' => 5]) }}
            </div>
        </div>
    </div>
    <table class="table table-blue table-contract">
        <thead>
            <tr>
                <th class="custom-checkbox" style="width:5%;">
                    @if(count($datas) > 0)
                    <input class="hidden" id="chk_ct_full" name="n" type="checkbox">
                    <label for="chk_ct_full"></label>
                    @endif
                </th>
                <th style="width:7%;">{{__('approve.lbl_contract_id')}}</th>
                <th style="width:20%;">{{__('approve.lbl_contract_ship')}}</th>
                <th style="width:20%;">{{__('approve.lbl_contract_service')}}</th>
                <th style="width:7%;">{{__('approve.lbl_contract_status')}}</th>
                <th style="width:7%;">{{__('approve.lbl_contract_ope')}}</th>
                <th style="width:16%;">{{__('approve.lbl_date_create')}}</th>
                <th style="width:10%;">{{__('approve.lbl_creator')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(count($datas) > 0)
                @foreach($datas as $contract)
                    @if(property_exists($contract, 'data_update') && !is_null($contract->data_update))
                    <tr id="item-approve-{{$contract->contract_id}}">
                        <td class="custom-checkbox">
                            <input class="hidden" id="chk_c_{{$contract->contract_id}}" name="chk_contract" type="checkbox">
                            <label for="chk_c_{{$contract->contract_id}}"></label>
                        </td>
                        <td>{{$contract->contract_id}}</td>
                        <td>{{$contract->data_update->contract_ship_name}}</td>
                        <td>{{$contract->data_update->contract_service_name}}</td>
                        <td>{{\App\Common\Constant::CONTRACT_O[$contract->data_update->contract_status]}}</td>
                        <td>{{$contract->request_operation??null}}</td>
                        <td>{{\Carbon\Carbon::parse($contract->data_update->contract_date_request)->format('Y/m/d H:i:s')}}</td>
                        <td>{{$contract->contract_user_request}}</td>
                        <td><div class="btn btn-blue-dark btn-custom-sm btn-detail" data-type="0" data-item="{{$contract->contract_id}}">{{__('approve.btn_detail')}}</div></td>
                    </tr>
                   @else
                        <tr id="item-approve-{{$contract->contract_id}}">
                            <td class="custom-checkbox">
                                <input class="hidden" id="chk_c_{{$contract->contract_id}}" name="chk_contract" type="checkbox">
                                <label for="chk_c_{{$contract->contract_id}}"></label>
                            </td>
                            <td>{{$contract->contract_id}}</td>
                            <td>{{$contract->contract_ship_name}}</td>
                            <td>{{$contract->contract_service_name}}</td>
                            <td>{{\App\Common\Constant::CONTRACT_O[$contract->contract_status]}}</td>
                            <td>{{$contract->request_operation??null}}</td>
                            <td>{{\Carbon\Carbon::parse($contract->contract_date_request)->format('Y/m/d H:i:s')}}</td>
                            <td>{{$contract->contract_user_request}}</td>
                            <td><div class="btn btn-blue-dark btn-custom-sm btn-detail" data-type="0" data-item="{{$contract->contract_id}}">{{__('approve.btn_detail')}}</div></td>
                        </tr>
                   @endif
                @endforeach
            @else
            <tr>
                <td colspan="9">{{__('approve.lbl_no_record')}}</td>
            </tr>
            @endif
        </tbody>
    </table>
    @if(count($datas) > 0)
        @if(!request()->has('setting_status') || 
            (request()->has('setting_status') && request()->get('setting_status') != \App\Common\Constant::STATUS_REJECT_APPROVE))
        <div class="block-handle align-right">
            <div class="btn btn-red btn-w150 outModal btn-reject" data-type="0">{{__('approve.btn_reject')}}</div>
            <div class="btn btn-blue-dark btn-w150 outModal btn-approve" data-type="0">{{__('approve.btn_approve')}}</div>
        </div>
        @endif
    @endif
    <div class="block-paginate block-handle align-center">
        <div class="fl-page">
            {{$datas->appends($_GET)->render()}}
        </div>
    </div>
</div>