@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    <a id="" href="/tenants/company/create" class="btn btn-primary mt-1">
        <i class="fas fa-plus-circle"></i> <span class="button-text">New Company</span>
    </a>
{{--    <p>Welcome to this beautiful admin panel.</p>--}}

    <!-- DATATABLE -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <table id="table_companies" class="table table-hover table-striped dataTable no-footer" style="width: 100%;">
                        <thead>
                        <tr role="row">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>SubDomain</th>
                            <th>Database Name</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END DATATABLE -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

{{--    <style>--}}
{{--        .dataTables_filter{--}}
{{--            visibility: hidden;--}}
{{--        }--}}
{{--    </style>--}}
@stop

@section('js')
{{--<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>--}}
    <script>
        function associarClickAEditar(){
            $('#table_companies tbody tr').each(function () {
                var id =  $(this).data('id') || "";
                if(id != ""){
                    $(this).on('click', function (e) {
                        var url = '/companies/' + $(this).data('id') + '/edit';
                        if (e.ctrlKey) {
                            var win = window.open(url, '_blank');
                            win.focus();
                        } else {
                            window.location.href = url;
                        }
                    });
                }
            });
        }
        let table_companies = $('#table_companies').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url:'{{ url("tenants/company/datatable") }}',
                data: function (d) {
                    // d.nome = $('input[name=nome]').val();
                }
            },
            columns: [
                { data: 'id', className: 'text-center' },
                { data: 'name', className: 'text-center'},
                { data: 'subdomain', className: 'text-center'},
                { data: 'db_database', className: 'text-center'},
                {
                    className: 'text-center',
                    width: "80px",
                    render: function (data, type, row, meta) {
                        var result = '<div class="btn-group" role="group" aria-label="Basic">';
                        result += '<a class="btn-edit" data-id="'+row.id+'"><i class="fas fa-lg fa-external-link-alt" style="color: #888;"></i></a>';
                        result += '</div>';
                        return result;

                    }

                },
            ],
            language: {
                url: '/plugins/DataTables/pt.json'
            },
            rowCallback: function (row, data) {
                $(row).data('id', data.id).css('cursor', 'pointer');
            },
            drawCallback: function () {
                //Colum Edit
                $('.btn-edit').on('click', function (e) {
                    var id = $(this).attr("data-id");

                    var url = '/tenants/company/' + id   + '/edit';
                    if (e.ctrlKey) {
                        url += "?result=close";
                        var win = window.open(url, '_blank');
                        win.focus();
                    } else {
                        window.location.href = url;
                    }
                });
            }
        });
        $('#btn_search').on('click', function(e) {
            table_companies.draw();
        });
        $('#btn_clean').on('click', function(e) {
            $('.filter-product').val('');
            table_companies.draw();
        });
        $('.filter-product').keyup(function(e) {
            if(e.keyCode == 13)
                table_companies.draw();
        });
    </script>
@stop

