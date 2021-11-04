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
        <div class="float-right mb-3">
            <form class="form-inline">
                <div class="form-group mr-2">
                    <input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018" />
                </div>
                <button type="submit" class="btn btn-md btn-danger">Filtrar <i class="fas fa-filter"></i></button>
            </form>
        </div>
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
                    <!--@foreach($dreams as $key => $dream)
                        <tr data-entry-id="{{ $dream->id }}">
                            <td>
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                                |
                                <a href="#" title="Enviar correo">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                                <ion-icon name="color-wand-outline"></ion-icon>
                            </td>
                        </tr>
                    @endforeach-->

                    <tr>
                        <td>
                            18-12-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            25-11-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            25-11-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            15-11-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            12-11-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            05-12-2021
                        </td>
                        <td>
                            ##
                            <div class="float-right">
                                <a href="dreams/details/08-06-2021" title="Detalles">
                                    <i class="far fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@stop
