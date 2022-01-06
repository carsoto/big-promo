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
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h2>{{ $data['total_users'] }}</h2>
                    <h5>Usuarios registrados</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h2>{{ $data['users_confirmed'] }}</h2>
                    <h5>Usuarios confirmados</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h2>{{ $data['exchanges'] }}</h2>
                    <h5>Cantidad de canjes</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h2>{{ $data['dreams'] }}</h2>
                    <h5>Cantidad de sueños</h5>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Cantidad de canjes por día</h3>
            <div class="chart-container">
                <div class="float-right pr-3 d-flex">
                    <input class="form-control input-sm" type="text" name="daterange" value="{{ $data['date_range']['from'] }} - {{ $data['date_range']['to'] }}" />
                </div>
                <div class="exchange-chart-container pr-3">
                    <canvas id="exchange-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
            <h3>Formatos canjeados</h3>
            <div class="offset-md-3 col-md-6 col-sm-12 m-2 pt-1 d-flex flex-row align-items-end justify-content-between">
            @foreach($data['bot_presentation'] AS $key => $bot)
            <div class="d-flex justify-content-center flex-column align-items-center">
                <img src="/img/{{ $key }}.png" />
                <h2>
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

            var cData = JSON.parse(`<?php echo $data['count_exchanges_per_day']; ?>`);
            var ctx = $("#exchange-chart");

            //bar chart data
            var data = {
                labels: cData.label,
                datasets: [
                    {
                        label: 'Canjes',
                        data: cData.data,
                        backgroundColor: [
                            '#36c', '#dc3912', '#f90', '#109618', '#909', '#0099c6', '#d47', '#fea588', '#00688B', '#008B8B', '#00C78C', '#3D9140', '#808000', '#FFA500', '#8B7E66', '#CDC0B0', '#8B4500', '#EE7942', '#EE6363', '#8B1A1A', '#7171C6', '#8E388E', '#8A8A8A', '#FF34B3', '#0000FF', '#4876FF', '#104E8B', '#00868B', '#00C957', '#FF5733', '#8E44AD'
                        ],
                        borderColor: [
                            '#36c', '#dc3912', '#f90', '#109618', '#909', '#0099c6', '#d47', '#fea588', '#00688B', '#008B8B', '#00C78C', '#3D9140', '#808000', '#FFA500', '#8B7E66', '#CDC0B0', '#8B4500', '#EE7942', '#EE6363', '#8B1A1A', '#7171C6', '#8E388E', '#8A8A8A', '#FF34B3', '#0000FF', '#4876FF', '#104E8B', '#00868B', '#00C957', '#FF5733', '#8E44AD'
                        ],
                        borderWidth: 1
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: false,
                    position: "top",
                    text: "Cantidad de canjes por día",
                    fontSize: 24,
                    fontColor: "#111"
                },
                legend: {
                    display: false,
                    position: "bottom",
                    /*labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }*/
                }
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });
            
           $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                autoApply: true,
                locale: {
                    format: 'DD/MM/YYYY',
                    separator: " - "
                }
            }, function(start, end, label) {
                let from = start.format('YYYY-MM-DD');
                let to = end.format('YYYY-MM-DD');

                $.get("/admin/dashboard/exchange/per-day/"+from+"/"+to, function( data ) {
                    var cData = JSON.parse(data);
                    console.log(cData);
                    console.log($("#exchange-chart"));
                    $('#exchange-chart').replaceWith('<canvas id="exchange-chart"></canvas>');
                    var ctx = $("#exchange-chart");

                    //bar chart data
                    var data = {
                        labels: cData.label,
                        datasets: [
                            {
                                label: 'Canjes',
                                data: cData.data,
                                backgroundColor: [
                                    '#36c', '#dc3912', '#f90', '#109618', '#909', '#0099c6', '#d47', '#fea588', '#00688B', '#008B8B', '#00C78C', '#3D9140', '#808000', '#FFA500', '#8B7E66', '#CDC0B0', '#8B4500', '#EE7942', '#EE6363', '#8B1A1A', '#7171C6', '#8E388E', '#8A8A8A', '#FF34B3', '#0000FF', '#4876FF', '#104E8B', '#00868B', '#00C957', '#FF5733', '#8E44AD'
                                ],
                                borderColor: [
                                    '#36c', '#dc3912', '#f90', '#109618', '#909', '#0099c6', '#d47', '#fea588', '#00688B', '#008B8B', '#00C78C', '#3D9140', '#808000', '#FFA500', '#8B7E66', '#CDC0B0', '#8B4500', '#EE7942', '#EE6363', '#8B1A1A', '#7171C6', '#8E388E', '#8A8A8A', '#FF34B3', '#0000FF', '#4876FF', '#104E8B', '#00868B', '#00C957', '#FF5733', '#8E44AD'
                                ],
                                borderWidth: 1
                            }
                        ]
                    };

                    //options
                    var options = {
                        responsive: true,
                        title: {
                            display: false,
                            position: "top",
                            text: "Cantidad de canjes por día",
                            fontSize: 24,
                            fontColor: "#111"
                        },
                        legend: {
                            display: false,
                            position: "bottom",
                            /*labels: {
                                fontColor: "#333",
                                fontSize: 16
                            }*/
                        }
                    };

                    //create Pie Chart class object
                    var chart1 = new Chart(ctx, {
                        type: "bar",
                        data: data,
                        options: options
                    });
                });
                
            });
        });
    </script>
@stop
