@extends('admin.layouts.app')
@section('title') @lang('transAdmin.ip-addresses') @endsection
@section('content')
    <link href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/datatables.mark.js') }}"></script>

    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transAdmin.ip-addresses')</div>
    </div>

    <div class="my-4">
        <input type="text" class="form-control form-control-lg mb-2 text-danger" id="customSearchBox"
               placeholder="@lang('transAdmin.search')..." autofocus>
        <table class="table shadow table-bordered table-striped table-hover table-md bg-white" id="dt-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>@lang('transAdmin.ip-address')</th>
                <th>@lang('transAdmin.country-code')</th>
                <th>@lang('transAdmin.country')</th>
                <th>@lang('transAdmin.city')</th>
                <th>@lang('transAdmin.status')</th>
            </tr>
            </thead>
        </table>
    </div>
    <style>
        mark {
            padding: 0;
            background-color: #FFEB3B;
        }

        .dataTables_empty {
            color: #858796;
            background-color: #f8f9fc !important;
        }

        #dt-table_length, #dt-table_filter {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function () {
            var table = $('#dt-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10],
                ajax: {
                    url: "{!! route('admin.ip-addresses.api') !!}",
                    dataType: "json",
                    type: "POST",
                    data: {"_token": "{!! csrf_token() !!}"}
                },
                columns: [
                    {data: 'id'},
                    { data: 'ip_address' },
                    { data: 'country_code' },
                    { data: 'country_name' },
                    { data: 'city_name' },
                    { data: 'disabled' },
                ],
                order: [[0, 'desc']],
                mark: true,
                "language": {
                    @if(app()->getLocale() == 'tm')
                    "url": "{{ asset('admin/js/datatables/tm.json') }}",
                    @elseif(app()->getLocale() == 'ru')
                    "url": "{{ asset('admin/js/datatables/ru.json') }}",
                    @endif
                }
            });

            var csb = document.getElementById('customSearchBox');
            var csbTimeout = null;
            csb.onkeyup = function (e) {
                var that = this;
                clearTimeout(csbTimeout);
                csbTimeout = setTimeout(function () {
                    if (table.search() !== that.value) {
                        table.search(that.value).draw();
                    }
                }, 500);
            };
        });
    </script>
@endsection