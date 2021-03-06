<!-- Title table -->
<div class="block-title-tbl">
    <div class="left-side">
        <label class="label-control">{{__('billing.lbl_count_record_1') . $model['resultSearch']->total() . __('billing.lbl_count_record_2')}}</label>
        {{ Form::hidden('total_record', $model['resultSearch']->total(), [ 'id' => 'total-record'])}}
    </div>
    <div class="right-side">
        <div class="form-group">
            <div class="left-side">
                <label class="label-control">{{__('billing.lbl_number_record_display')}}</label>
            </div>
            <div class="right-side">
                <div class="custom-select">
                    {!! Form::select(0, $model['numberRecord'], null, ['class' => 'form-control', 'id' => 'slt-number-record']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!--Table company billing-->
<div id="block-tbl-company">
    <table class="table table-blue table-list-company resizable">
        <thead>
            <tr>
                <th rowspan="2" class="tbl-row-pick rowspan2"></th>
                <th rowspan="2" class="tbl-row-no rowspan2">{{__('billing.tbl_list_company_header.no')}}</th>
                <th rowspan="2" class="tbl-row-company-name rowspan2">{{__('billing.tbl_list_company_header.company_name')}}</th>
                <th rowspan="2" class="tbl-row-date rowspan2">{{__('billing.tbl_list_company_header.payment_due_date')}}</th>
                <th rowspan="2" class="tbl-row-method rowspan2">{{__('billing.tbl_list_company_header.billing_method_name')}}</th>
                <th colspan="3">{{__('billing.tbl_list_company_header.operation_no')}}</th>
                <th rowspan="2" class="tbl-row-money rowspan2">{!!__('billing.tbl_list_company_header.total_money')!!}</th>
                <th rowspan="2" class="tbl-row-status rowspan2">{{__('billing.tbl_list_company_header.status')}}</th>
                <th rowspan="2" class="tbl-row-approve rowspan2">{{__('billing.tbl_list_company_header.status_approve')}}</th>
                <th rowspan="2" class="tbl-row-process rowspan2"></th>
            </tr>
            <tr>
                <th class="tbl-row-ope-name">{{__('billing.tbl_list_company_header.ope_name')}}</th>
                <th class="tbl-row-ope-phone">{{__('billing.tbl_list_company_header.ope_phone')}}</th>
                <th class="tbl-row-ope-email">{{__('billing.tbl_list_company_header.ope_email')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($model['resultSearch'] as $row)
                <tr>
                    <td class="tbl-row-pick">
                        <div class="custom-radio">
                            {{ Form::radio('rdo_company', $row->company_id, false,
                                        ['ope-id' => $row->ope_company_id,
                                        'hb-id' => $row->history_billing_id, 
                                        'id' => 'company-id-' . $loop->iteration,
                                        'class' => 'hidden btn-radio-company']) }}
                            <label for="company-id-{{$loop->iteration}}" class='lbl-radio-company'></label>
                        </div>
                    </td>
                    <td class="tbl-row-no">{{ $loop->iteration}}</td>
                    <td class="tbl-row-company-name">{{ $row->company_name }}</td>
                    <td class="tbl-row-date">{{ $row->payment_deadline_month }}</td>
                    <td class="tbl-row-method">{{ $row->method_name }}</td>
                    <td class="tbl-row-ope-name">{{ $row->ope_person_name_1 }}</td>
                    <td class="tbl-row-ope-phone">{{ $row->ope_phone_1 }}</td>
                    <td class="tbl-row-ope-email">{{ $row->ope_email_1 }}</td>
                    <td class="tbl-row-money">{{ $row->total_money_yen }}</td>
                    <td class="tbl-row-status">
                        {{ $row->statusString }}
                        {{ Form::hidden('status', $row->status, [ 'id' => 'hidden-status-' . $row->company_id]) }}
                    </td>
                    <td class="tbl-row-approve">
                        @if ($row->approved_flag == Constant::STATUS_REJECT_APPROVE)
                            <a href="#" id-for='#reason-reject-{{$row->company_id}}' class='link-reason-reject'>{{ $row->approveString }}</a>
                            {{ Form::hidden('reason_reject', $row->reason_reject, [ 'id' => 'reason-reject-' . $row->company_id]) }}
                        @else
                            <span>{{ $row->approveString }}</span>
                        @endif
                    </td>
                    <td class="tbl-row-process">
                        <a href="{{route('billing.preview.billing.paper')}}?company_id={{$row->company_id}}" target="_blank" id="btn-pdf">
                            <i class="glyphicon glyphicon-file"></i>
                        </a>
                        <a href="{{route('billing.history.billing')}}"  id="btn-history">
                            <i class="fa fa-history" aria-hidden="true"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--Process billing-->
<div class="create-billing">
    <div class="content-billing">
        <div class="form-group">
            <div class="left-side">
                <label class="label-control">{{__('billing.lbl_remark')}}</label>
            </div>
            <div class="right-side">
                <div class="custom-select">
                    {!! Form::textarea('remark', null, ['size' => '30x3', 'class' => 'form-control', 'placeholder' => __('billing.lbl_remark'), 'id' => 'txt-remark', 'tabindex' => 100]) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="left-side">
                <label class="label-control">{{__('billing.lbl_is_detail')}}</label>
            </div>
            <div class="right-side">
                <div class="custom-checkbox">
                    {{ Form::checkbox('is_detail', 1, false, ['class' => 'hidden', 'id' => 'chk-detail']) }}
                    <label for="chk-detail"></label>
                </div>
            </div>
        </div>
    </div>
    <div class="process-billing">
        <div class="right-side">
            <a href="{{route('company.index')}}" id='btn-back' class='btn btn-blue-light btn-w150' tabindex="102">{{__('billing.btn_back')}}</a>

            <!--Check permission create billing paper-->
            @if (Roles::checkPermission(Constant::ALLOW_BILLING_CREATE, Constant::IS_CHECK_BUTTON))
                {!! Form::button( __('billing.btn_create'), ["class"=>"btn btn-green-dark btn-w150", 'id' => 'btn-create', 'tabindex' => 103]) !!}
            @endif

            {!! Form::button( __('billing.btn_export_csv'), ["class"=>"btn btn-blue-dark btn-w150", 'id' => 'btn-export-csv', 'tabindex' => 104]) !!}

            <!--Check permission delivery-->
            @if (Roles::checkPermission(Constant::ALLOW_BILLING_CREATE, Constant::IS_CHECK_BUTTON))
                {!! Form::button( __('billing.btn_delivery'), ["class"=>"btn btn-green-dark btn-w150", 'id' => 'btn-delivery', 'tabindex' => 105]) !!}
            @endif
        </div>
    </div>
</div>

<div class="col-md-12" id="area-paginate" class="clear-both">
    @include('billing.component.paginate.default')
</div>
