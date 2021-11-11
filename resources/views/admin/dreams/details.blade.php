@extends('adminlte::page')

@section('title', 'Sueños')

@section('content_header')
    <!--<h1>Listado de usuarios</h1>-->
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Sueños {{ $date }}</h1>
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    {{ asset('videos/test.mp4') }}
                    <video-player video-uid="123456789" video-url="{{ asset('videos/test.mp4') }}" thumbnail-url=""></video-player>
                </div>
            </div>
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
           
        });
    </script>
@stop
