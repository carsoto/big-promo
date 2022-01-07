@extends('adminlte::page')

@section('title', 'Sueños')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Sueños de {{ $data['user']->fullName() }}</h1>
    </div>
    <div class="card-body row">
        @foreach($data['dreams'] AS $key => $value)
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center mb-5">
            <video width="100%" height="240" controls>
                <source src="{{ $value->dream }}" type="video/mp4">
            </video>
            <br>
            <p><strong>Subido el: {{ Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</strong></p>
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
