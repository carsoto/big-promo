@extends('adminlte::page')

@section('title', 'Sueños')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Sueños {{ Carbon\Carbon::parse($data['date'])->format('d-m-Y') }}</h1>
    </div>
    <div class="card-body row">
        @foreach($data['dreams'] AS $key => $value)
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center mb-5">
            <video width="100%" height="240" controls>
                <source src="{{ $value->dream }}" type="video/mp4">
            </video>
            <h5 class="p-1"><b>Participante:</b> {{ $value->user->fullName() }}</h5>
            <h5 class="p-1"><b>Ciudad:</b> {{ $value->user->city->name }}</h5>
            <p><a href="/api/download-dream-video/{{ $value->id }}"><i class="fas fa-download"></i> Descargar</a></p>
        </div>
        @endforeach
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $(function () {
           
        });
    </script>
@stop
