@extends('layouts.white')

@section('title', trans('ship.head_title_list_ship'))

@section('style')
    <link rel="stylesheet" href="{{ asset("/css/ship-general.css") }}">
@endsection

@section('menu_header')
    @include('elements.service_menu')
@endsection

@section('body-class', 'list-ship')

@section('content')
    <div class="main-content">
        <h1 class="main-heading">{{ trans('ship.head_title_list_ship') }}</h1>

        <div class="main-summary">
            {{-- Link search all --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="block-list-ship">
                        <a class="none-focus-outline" href="{{ route('ship.index') }}" tabindex="1">
                            {{ trans('ship.link_search_all') }}
                        </a>
                    </div>
                </div>
            </div>

            {{-- Total record --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 block-list-ship">
                        <label id="total-result">
                            {{ trans('ship.lbl_total_result', ['total' => count(collect($ships->items())->groupBy('id'))]) }}
                        </label>

                        <div class="block-right">
                            <div class="col-md-4">
                                <label>
                                    {{ trans('ship.lbl_load_result') }}
                                </label>
                            </div>
                            <div class="load-result custom-select">
                                {{ Form::select(
                                    'paginate-record',
                                    $aryPerPage,
                                    $perPage,
                                    [
                                        'class' => 'form-control',
                                        'id' => 'load-result',
                                        'data-url' => route('ship.index')
                                    ])
                                }}
                            </div>
                            {{ Form::hidden(
                                'value-after-search',
                                '{"load": "' . $perPage . '"}',
                                ['id' => 'value-after-search']
                            ) }}
                            {{ Form::hidden('sort-value', '{
                                    "filter-ship-name": "0",
                                    "filter-company": "0",
                                    "filter-classification": "0",
                                    "filter-ship-type": "0",
                                    "filter-imo-number": "0",
                                    "filter-ship-nation": "0"
                                }', [
                                    'id' => 'sort-value',
                                    'data-url' => $url,
                                ])
                            }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="block-list-ship">
                        <div class="block-table">
                            {{-- Include list ship table --}}
                            @include('ship.component.list.table-template')
                        </div>
                    </div>
                </div>
            </div>

            {{-- Button --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="block-list-ship-bottom">
                        <div class="block-button block-button-right">
                            <a href="{{ route('ship.create') }}" class="btn btn-blue-dark btn-w150" tabindex="12">
                                {{ trans('ship.btn_create_ship') }}
                            </a>
                            {{ Form::button(trans('ship.btn_back'), ['class' => 'btn btn-gray btn-w150', 'tabindex' => 11]) }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Paginate --}}
            <div class="row" id="area-paginate">
                @include('ship.component.paginate', ['pagination' => $ships])
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    {{-- Include ship general JS --}}
    <script src="{{ asset('js/ship-general.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            const table = document.querySelector('.block-table');
            const psWidth = new PerfectScrollbar(table, function () {
                table.style.width = '100%'
            });

            const content = document.querySelector('.table-content');
            const psHeight = new PerfectScrollbar(content, function () {
                content.style.height = '300px'
            });

            // remove class when init
            $('.block-table').removeClass('ps--active-y');
        });
    </script>
@endsection
