@extends('admin.layouts.app')
@section('content')

    <link href="{{ asset('admin/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/datatables.mark.js') }}"></script>

    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0"> @lang('transAdmin.shop')</div>
        <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> @lang('transAdmin.product')
        </a>
    </div>



    <div class="my-4">

        <table class="table shadow table-bordered table-striped table-hover table-md bg-white" id="posts-table">
            <thead>
            <tr>
                <th>ID</th>
                <th> <img src="{!! asset('admin/img/flags/tkm.png') !!}" alt="TKM"
                          class="border mr-1">@lang('transAdmin.title')</th>
                <th> <img src="{!! asset('admin/img/flags/rus.png') !!}" alt="TKM"
                          class="border mr-1">@lang('transAdmin.title')</th>
                <th> <img src="{!! asset('admin/img/flags/eng.png') !!}" alt="TKM"
                          class="border mr-1">@lang('transAdmin.title')</th>
                {{--<th>@lang('transAdmin.barcode')</th>--}}
                <th>@lang('transAdmin.image')</th>
                <th>@lang('transAdmin.status')</th>

                <th><i class="fas fa-cog"></i></th>
            </tr>
            </thead>
        </table>
    </div>
    <style>
        mark {
            padding: 0;
            background-color: #FFEB3B;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [10, 25, 50],
                ajax: {
                    url:"<?= route('admin.product.api') ?>",
                    dataType:"json",
                    type:"POST",
                    data:{"_token":"<?= csrf_token() ?>"}
                },
                columns: [
                    { data: 'id' },
                    { data: 'title_tm' },
                    { data: 'title_ru' },
                    { data: 'title_en', searchable :false, orderable :false },
                    // { data: 'barcode', searchable :false, orderable :false },
                    { data: 'img', searchable :false, orderable :false },
                    { data: 'active', searchable :false, orderable :false },

                    { data: 'action', searchable :false, orderable :false }
                ],
                order: [[0, 'desc']],
                mark: true,
                language: {
                    emptyTable:       "Makala tapylmady",
                    info:             "_START_ - _END_ aralygy görkezilýär | Jemi _TOTAL_",
                    infoEmpty:        "0 makala görkezilýär",
                    infoFiltered:     "(_MAX_ maglumatdan gözleg esasynda)",
                    infoPostFix:      "",
                    lengthMenu:       "Görkez _MENU_ ",
                    loadingRecords:   "Ýüklenýär...",
                    processing:       "Dowam edýär...",
                    search:           "",
                    zeroRecords:      "Gözlegiňize göra makala tapylmady :(",
                    paginate: {
                        first:        "Ilkinji",
                        previous:     "Öňki",
                        next:         "Indiki",
                        last:         "Soňky"
                    }
                },
                stateSave: true,
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
