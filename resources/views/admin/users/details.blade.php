@extends('adminlte::page')

@section('title', 'Detalle participante')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>{{ $user->fullName() }}</h1>
    </div>

    <div class="card-body">
        <div class="container">
            <h2 class="text-center p-3">Historial de puntos</h2>
            <div class="table-wrapper-scroll-y table-scrollbar">
            <table class="table table-fixed text-center">
                <thead>
                    <tr>
                        <th class="col-3">Botella</th>
                        <th class="col-3">Código</th>
                        <th class="col-3">Fecha</th>
                        <th class="col-3">Puntos</th>
                        <th class="col-3">Adicional</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->user_exchanges as $key => $exchange)
                    <tr>
                        <td class="col-3">{{ $exchange->bot_presentation }}</td>
                        <td class="col-3">{{ $exchange->code }}</td>
                        <td class="col-3">{{ $exchange->registered }}</td>
                        <td class="col-3">{{ $exchange->points }}</td>
                        <td class="col-3">{{ $exchange->aditional_points }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
           
        });
    </script>
@stop
