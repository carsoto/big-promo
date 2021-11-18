@extends('adminlte::page')

@section('title', 'Sueños')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Listado de sueños</h1>
    </div>

    <div class="card-body">
        <!--<div class="float-right mb-3">
            <form class="form-inline">
                <div class="form-group mr-2">
                    <input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                </div>
                <button type="submit" class="btn btn-md btn-danger">Filtrar <i class="fas fa-filter"></i></button>
            </form>
        </div>-->
        <div class="table-responsive">
            <table id="dreams-table" class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Cantidad de sueños
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($count_dreams as $key => $cantidad)
                        <tr>
                            <td>
                                {{ Carbon\Carbon::parse($key)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ $cantidad }}
                                <div class="float-right">
                                    <a href="dreams/details/{{ $key }}" title="Detalles">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style scoped>
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }
    </style>
@stop

@section('js')
    <script> 
        $(function () {
            $('#dreams-table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: "Exportar a Excel",
                        extend: 'excelHtml5',
                        title: 'Listado_Destapa_tu_sueno',
                        className: 'btn-danger'
                    }
                ]
            });
        });
    </script>
@stop
