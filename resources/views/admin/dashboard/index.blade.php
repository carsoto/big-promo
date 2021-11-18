@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-md-3 p-4">
            <div class="small-box bg-red">
                <div class="inner">
                    <h1>{{ $data['total_users'] }}</h1>
                    <h2>Usuarios registrados</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-red">
                <div class="inner">
                    <h1>{{ $data['users_confirmed'] }}</h1>
                    <h2>Usuarios confirmados</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-red">
                <div class="inner">
                    <h1>{{ $data['exchanges'] }}</h1>
                    <h2>Cantidad de canjes</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-red">
                <div class="inner">
                    <h1>{{ $data['dreams'] }}</h1>
                    <h2>Cantidad de sueños</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
            <h3>Formatos canjeados</h3>
            <div class="offset-md-3 col-md-6 col-sm-12 m-2 pt-1 d-flex flex-row align-items-end justify-content-between">
            @foreach($data['bot_presentation'] AS $key => $bot)
            <div class="d-flex justify-content-center flex-column align-items-center">
                <img src="/img/{{ $key }}.png" />
                <h2 class="font-weight-bold">
                    @if(array_key_exists($bot, $data['format_exchanges']))
                    {{ $data['format_exchanges'][$bot] }}
                    @else
                    0
                    @endif
                </h2>
            </div>
            @endforeach
            </div>
        </div>    
    </div>
    

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-danger">
                    <div class="box-header with-border">
                    <h3 class="box-title">Registros diarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed text-center">
                                <thead>
                                    <tr>
                                        <th class="col-6">Fecha</th>
                                        <th class="col-6">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['daily_user_records'] as $key => $record)
                                    <tr>
                                        <td class="col-6">{{ Carbon\Carbon::parse($record->fecha)->format('d-m-Y') }}</td>
                                        <td class="col-6">{{ $record->cantidad }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-danger">
                    <div class="box-header with-border">
                    <h3 class="box-title">Ciudades participantes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-wrapper-scroll-y table-scrollbar">
                            <table class="table table-fixed text-center">
                                <thead>
                                    <tr>
                                        <th class="col-6">Ciudad</th>
                                        <th class="col-6">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['participating_cities'] as $key => $value)
                                    <tr>
                                        <td class="col-6">{{ $value->name }}</td>
                                        <td class="col-6">{{ $value->cantidad }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>    
        </div>
    </div>
</div>
@stop

@section('css')
<style scoped>
    .table-scrollbar {
        position: relative;
        height: 400px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        border-radius: 10px;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: gainsboro;
        border-radius: 10px;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: gainsboro;
    }
    </style>
@stop

@section('js')
    <script> 
        $(function () {
            /*$('#users-table').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                dom: 'Bfrtip',
                
                buttons: [
                    {
                        text: "Exportar a Excel",
                        extend: 'excelHtml5',
                        title: 'Participantes_Destapa_tu_sueno',
                        className: 'btn-danger'
                    }
                ]
            });*/
        });
    </script>
@stop
