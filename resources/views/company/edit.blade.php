@extends('layouts.white')

@section('title', trans('company.title_head_create_company'))

@section('style')
    <link rel="stylesheet" href="{{ asset("/css/company-general.css") }}">
@endsection

@section('menu_header')
    @include('elements.service_menu')
@endsection

@section('body-class', 'update-company')

@section('content')
    <div class="main-content">
        <h1 class="main-heading">{{ trans('company.title_head_update_company') }}</h1>

        <div class="main-summary">
            <div class="titlle-form-search">
                <h2>{{ trans('company.lbl_title_company_infomation') }}</h2>
            </div>
            <!-- begin alert errors -->
            @if ($errors->all())
                <div class="alert alert-danger alert-show">
                    @foreach ($errors->messages() as $attribute => $error)
                <div class="block-error">
                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                    <label class="control-label">
                                {{ $errors->first($attribute) }}
                    </label>
                </div>
                    @endforeach
                </div>
            @endif

            <div class="append-message"></div>
            <!-- end alert errors -->
            {{ Form::open(['url' => route('company.update', $company->id), 'method' => 'PUT']) }}
            <!-- begin form input company infomation -->
            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-name-jp">
                            {{ trans('company.lbl_title_company_name_jp') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                    <div class="form-input {{ $errors->has('txt-company-name-jp') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-name-jp', $company->name_jp, [
                                'class' => 'form-control',
                                'tabindex' => 1,
                                'require' => true,
                                'placeholder' => trans('company.lbl_title_company_name_jp'),
                                'id' => 'txt-company-name-jp',
                                'data-name-remark' => $company->name_jp,
                                'data-url' => route('company.check.duplicate.name'),
                                'data-company-id' => $company->id,
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-name-en">
                            {{ trans('company.lbl_title_company_name_en') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                    <div class="form-input {{ $errors->has('txt-company-name-en') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-name-en', $company->name_en, [
                                'class' => 'form-control',
                                'tabindex' => 2,
                                'require' => true,
                                'placeholder' => trans('company.lbl_title_company_name_en'),
                                'id' => 'txt-company-name-en',
                                'data-name-remark' => $company->name_en,
                                'data-url' => route('company.check.duplicate.name'),
                                'data-company-id' => $company->id,
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="slb-nation">
                            {{ trans('company.lbl_title_company_nation') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input input-group-search-popup {{ $errors->has('company-nation-id') ? ' has-error' : '' }}">
                            {{ Form::text('company-nation', $nations->where('id', $company->nation_id)->first()
                                    ? $nations->where('id', $company->nation_id)->first()->name_jp
                                    : null, [
                                        'class' => 'form-control',
                                        'placeholder' => trans('ship.lbl_title_nation'),
                                        'readonly' => 'readonly',
                                        'id' => 'company-nation',
                                        'tabindex' => 3,
                                ])
                            }}
                        <div class="input-group-addon show-modal-service"
                            id="search-nation"
                            data-toggle="modal"
                            data-target="#popup-company-search-nation">
                                <i class="fa fa-search"></i>
                        </div>
                        {{ Form::hidden('company-nation-id', $company->nation_id, ['id' => 'company-nation-id']) }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-postal-code">
                            {{ trans('company.lbl_title_company_postal_code') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-postal-code') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-postal-code', $company->postal_code, [
                                'class' => 'form-control',
                                'tabindex' => 4,
                                'placeholder' => trans('company.lbl_title_company_postal_code'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-address">
                            {{ trans('company.lbl_title_company_address') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-address') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-address', $company->head_office_address, [
                                'class' => 'form-control',
                                'tabindex' => 5,
                                'placeholder' => trans('company.lbl_title_company_address')
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-represent-person">
                            {{ trans('company.lbl_title_company_represent_person') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-represent-person') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-represent-person', $company->represent_person, [
                                'class' => 'form-control',
                                'tabindex' => 6,
                                'require' => true,
                                'placeholder' => trans('company.lbl_title_company_represent_person'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-fund">
                            {{ trans('company.lbl_title_company_fund') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-fund') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-fund', $company->fund, [
                                'class' => 'form-control',
                                'tabindex' => 7,
                                'placeholder' => trans('company.lbl_title_company_fund'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                            <label for="txt-company-employee-number">
                                {{ trans('company.lbl_title_company_employee_number') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-employee-number') ? ' has-error' : '' }}">
                            {{ Form::text('txt-company-employee-number', $company->employees_number, [
                                    'class' => 'form-control',
                                    'tabindex' => 8,
                                    'placeholder' => trans('company.lbl_title_company_employee_number'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                            <label for="slb-company-currency">
                                {{ trans('company.lbl_title_company_currency') }}
                                <span class="require">*</span>
                        </label>
                    </div>
                    <div class="form-input input-group-search-popup {{ $errors->has('company-currency-id') ? ' has-error' : '' }}">
                        @php
                            $currencyDataId = $currency->where('id', $company->currency_id)->first()
                                ? $currency->where('id', $company->currency_id)->first()->id
                                : null;
                        @endphp
                        @if (!$existsContract)
                            @php
                                $currencyDataName = $currency->where('id', $company->currency_id)->first()
                                    ? $currency->where('id', $company->currency_id)->first()->code
                                    : null;
                            @endphp
                            {{ Form::text('company-currency', $currencyDataName, [
                                        'class' => 'form-control',
                                        'placeholder' => trans('company.lbl_title_company_currency'),
                                        'readonly' => 'readonly',
                                        'id' => 'company-currency',
                                        'tabindex' => 9,
                                ])
                            }}
                            <div class="input-group-addon show-modal-service"
                                id="search-currency"
                                data-toggle="modal"
                                data-target="#popup-company-search-currency">
                                    <i class="fa fa-search"></i>
                            </div>
                        @else
                            <label for="">
                                {{ $currency->where('id', $company->currency_id)->first()
                                    ? $currency->where('id', $company->currency_id)->first()->code
                                    : null
                                }}
                            </label>
                        @endif
                        {{ Form::hidden('company-currency-id', $currencyDataId, ['id' => 'company-currency-id']) }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-year-research">
                            {{ trans('company.lbl_title_company_year_research') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-year-research') ? ' has-error' : '' }}">
                            {{ Form::text('txt-company-year-research', $company->year_research, [
                                'class' => 'form-control',
                                'tabindex' => 10,
                                'placeholder' => trans('company.lbl_title_company_year_research'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="slb-company-billing-method">
                            {{ trans('company.lbl_title_company_billing_method') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input custom-select {{ $errors->has('slb-company-billing-method') ? ' has-error' : '' }}" id="select2-billing-method">
                            @php
                                $billingData = [];
                                $checkedBilling = $billingMethod->where('id', $company->billing_method_id)->first()
                                    ? $billingMethod->where('id', $company->billing_method_id)->first()->id
                                    : null;
                                foreach ($billingMethod as $billing) {
                                    $billingData[$billing->id] = $billing->name_jp;
                                }
                            @endphp
                            {{ Form::select('slb-company-billing-method', $billingData, $checkedBilling, [
                                    'class' => 'form-control',
                                    'tabindex' => 11,
                                    'id' => 'slb-company-billing-method'
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="slb-company-month-billing">
                            {{ trans('company.lbl_title_company_month_billing') }}
                        </label>
                    </div>
                        <div class="form-input custom-select {{ $errors->has('slb-company-month-billing.*') ? ' has-error' : '' }}">
                            @php
                                $dataMonth = [];
                                $monthChecked = array_map('intval', explode(',', $company->month_billing));
                                for ($month = 1; $month <= 12; $month++) {
                                    $dataMonth[$month] = trans('company.lbl_month') . $month;
                                }
                            @endphp
                            {{ Form::select('slb-company-month-billing[]', $dataMonth, $monthChecked, [
                                    'class' => 'form-control',
                                'tabindex' => 12,
                                'multiple' => 'multiple',
                                    'data-placeholder' => trans('company.lbl_title_company_month_billing'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-payment-deadline-no">
                                {{ trans('company.lbl_title_company_payment_deadline_no') . '(' . trans('company.lbl_month') . ')' }}
                                <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-payment-deadline-no') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-payment-deadline-no', $company->payment_deadline_no, [
                                'class' => 'form-control',
                                'tabindex' => 13,
                                'placeholder' => trans('company.lbl_title_company_payment_deadline_no'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-site">
                            {{ trans('company.lbl_title_company_site') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-site') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-site', $company->billing_day_no, [
                                'class' => 'form-control',
                                'tabindex' => 14,
                                'placeholder' => trans('company.lbl_title_company_site'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-currency-code">
                            {{ trans('company.lbl_title_company_currency_code') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-currency-code') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-currency-code', $company->currency_code, [
                                'class' => 'form-control',
                                'tabindex' => 15,
                                'placeholder' => trans('company.lbl_title_company_currency_code'),
                                'require' => true,
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="slb-company-operation">
                            {{ trans('company.lbl_title_company_operation') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input custom-select {{ $errors->has('slb-company-operation') ? ' has-error' : '' }}">
                            @php
                                $companyOpeData = [];
                                foreach ($companyOpe as $companyO) {
                                    $companyOpeData[$companyO->id] = $companyO->name;
                                }
                            @endphp
                            {{ Form::select('slb-company-operation', $companyOpeData, $company->ope_company_id, [
                                'class' => 'form-control',
                                'tabindex' => 16,
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-company-url">
                            {{ trans('company.lbl_title_company_url') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-company-url') ? ' has-error' : '' }}">
                        {{ Form::text('txt-company-url', $company->url, [
                                'class' => 'form-control',
                                'tabindex' => 17,
                                'placeholder' => trans('company.lbl_title_company_url'),
                            ])
                        }}
                    </div>
                </div>
            </div>
            <!-- end form input company infomation -->
            <!-- begin form input operation person 1 -->
            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label>
                            {{ trans('company.lbl_company_ope_person_1') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-name-1">
                            {{ trans('company.lbl_title_ope_name') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-name-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-name-1', $company->ope_person_name_1, [
                                'class' => 'form-control',
                                'tabindex' => 18,
                                'placeholder' => trans('company.lbl_title_ope_name'),
                                'require' => true,
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-position-1">
                            {{ trans('company.lbl_title_ope_position') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-position-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-position-1', $company->ope_position_1, [
                                'class' => 'form-control',
                                'tabindex' => 19,
                                'placeholder' => trans('company.lbl_title_ope_position'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-department-1">
                            {{ trans('company.lbl_title_ope_department') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-department-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-department-1', $company->ope_department_1, [
                                'class' => 'form-control',
                                'tabindex' => 20,
                                'placeholder' => trans('company.lbl_title_ope_department'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-postal-code-1">
                            {{ trans('company.lbl_title_ope_postal_code') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-postal-code-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-postal-code-1', $company->ope_postal_code_1, [
                                'class' => 'form-control',
                                'tabindex' => 21,
                                'placeholder' => trans('company.lbl_title_ope_postal_code'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-address-1">
                            {{ trans('company.lbl_title_ope_address') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-address-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-address-1', $company->ope_address_1, [
                                'class' => 'form-control',
                                'tabindex' => 22,
                                'placeholder' => trans('company.lbl_title_ope_address'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-phone-1">
                            {{ trans('company.lbl_title_ope_phone') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-phone-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-phone-1', $company->ope_phone_1, [
                                'class' => 'form-control',
                                'tabindex' => 23,
                                'placeholder' => trans('company.lbl_title_ope_phone'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-fax-1">
                            {{ trans('company.lbl_title_ope_fax') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-fax-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-fax-1', $company->ope_fax_1, [
                                'class' => 'form-control',
                                'tabindex' => 24,
                                'placeholder' => trans('company.lbl_title_ope_fax'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-email-1">
                            {{ trans('company.lbl_title_ope_email') }}
                            <span class="require">*</span>
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-email-1') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-email-1', $company->ope_email_1, [
                                'class' => 'form-control',
                                'tabindex' => 25,
                                'placeholder' => trans('company.lbl_title_ope_email'),
                                'require' => true,
                            ])
                        }}
                    </div>
                </div>
            </div>
            <!-- end form input operation person 1 -->
            <!-- begin form input operation person 2 -->
            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label>
                            {{ trans('company.lbl_company_ope_person_2') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-name-2">
                            {{ trans('company.lbl_title_ope_name') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-name-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-name-2', $company->ope_person_name_2, [
                                'class' => 'form-control',
                                'tabindex' => 26,
                                'placeholder' => trans('company.lbl_title_ope_name'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-position-2">
                            {{ trans('company.lbl_title_ope_position') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-position-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-position-2', $company->ope_position_2, [
                                'class' => 'form-control',
                                'tabindex' => 27,
                                'placeholder' => trans('company.lbl_title_ope_position'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-department-2">
                            {{ trans('company.lbl_title_ope_department') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-department-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-department-2', $company->ope_department_2, [
                                'class' => 'form-control',
                                'tabindex' => 28,
                                'placeholder' => trans('company.lbl_title_ope_department'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-postal-code-2">
                            {{ trans('company.lbl_title_ope_postal_code') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-postal-code-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-postal-code-2', $company->ope_postal_code_2, [
                                'class' => 'form-control',
                                'tabindex' => 29,
                                'placeholder' => trans('company.lbl_title_ope_postal_code'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-address-2">
                            {{ trans('company.lbl_title_ope_address') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-address-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-address-2', $company->ope_address_2, [
                                'class' => 'form-control',
                                'tabindex' => 30,
                                'placeholder' => trans('company.lbl_title_ope_address'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-phone-2">
                            {{ trans('company.lbl_title_ope_phone') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-phone-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-phone-2', $company->ope_phone_2, [
                                'class' => 'form-control',
                                'tabindex' => 31,
                                'placeholder' => trans('company.lbl_title_ope_phone'),
                            ])
                        }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-fax-2">
                            {{ trans('company.lbl_title_ope_fax') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-fax-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-fax-2', $company->ope_fax_2, [
                                'class' => 'form-control',
                                'tabindex' => 32,
                                'placeholder' => trans('company.lbl_title_ope_fax'),
                            ])
                        }}
                    </div>
                </div>

                <div class="col-md-6 block-input">
                    <div class="lbl-title">
                        <label for="txt-ope-email-2">
                            {{ trans('company.lbl_title_ope_email') }}
                        </label>
                    </div>
                        <div class="form-input {{ $errors->has('txt-ope-email-2') ? ' has-error' : '' }}">
                        {{ Form::text('txt-ope-email-2', $company->ope_email_2, [
                                'class' => 'form-control',
                                'tabindex' => 33,
                                'placeholder' => trans('company.lbl_title_ope_email'),
                            ])
                        }}
                    </div>
                </div>
            </div>
            <!-- end form input operation person 2 -->
            <div class="row">
                <div class="col-md-12 block-button">
                    {{ Form::button(trans('company.btn_update_company'), [
                            'class' => 'btn btn-green-dark btn-w150',
                            'tabindex' => 40,
                            'type' => 'submit'
                        ])
                    }}
                    <a href="{{ route('company.show', $company->id) }}" class="btn btn-gray-dark btn-w150" tabindex="39">{{ trans('company.btn_back_to_list') }}</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    {{ Form::hidden('nation-url', route('nation.search'), ['id' => 'url-search-nation']) }}
    {{ Form::hidden('search-nation-type-company', 'company', ['id' => 'type-company']) }}
    <div class="modal modal-protector modal-normal fade" id="popup-company-search-nation" tabindex="-1" role="dialog">
        @include('common.popup-search-nation', ['type' => 'company', 'status' => $company->nation_id])
    </div>

    {{ Form::hidden('billing-method-url', route('billing.method.get.by.currency'), ['id' => 'url-get-billing-method']) }}
    <div class="modal modal-protector modal-normal fade" id="popup-company-search-currency" tabindex="-1" role="dialog">
        @include('common.popup-search-currency')
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/search-common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/edit-company-general.js') }}"></script>
@endsection
