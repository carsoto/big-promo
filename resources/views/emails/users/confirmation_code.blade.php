<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div id="app" class="d-flex flex-column align-items-center justify-content-center">
            <div class="text-center">
                <img style="width: 70%"  src="{{ asset('img/Slogan.png') }}" alt="">
            </div>
            
            <div class="rounded p-5 m-5" style="width: 450px; height: 550px; background: white;">
                <h4><strong>Hola {{ $name }} {{ $lastname }},</strong></h4>    
                <p style="font-size: 18px;">Gracias por registrarte en <strong>BIG Promo!</strong><p>
                <p style="font-size: 18px;">Por favor confirma tu correo electrónico.</p>
                <p style="font-size: 18px;">Para ello simplemente debes hacer click en el siguiente enlace:</p>
                
                <div class="d-flex flex-column align-items-center justify-content-center">
                <a class="btn btn-lg btn-primary-big p-3" href="{{ url('/register/verify/' . $confirmation_code) }}">
                    Click para confirmar tu email
                </a>
                <br><br><img class="text-center" style="width: 25%" src="{{ asset('img/logo.png') }}" alt="">   
                </div>
            </div>
            
        </div>
    </body>
<style scoped>
    #app {
        position: relative;
        overflow-x: hidden;
        background: rgb(253,13,27);
        background: radial-gradient(circle, rgba(253,13,27,1) 0%, rgba(172,3,13,1) 100%);
    }
    .btn-primary-big{
        color: #000 !important;
        font-weight: bold;
        background-color: #FEDD31 !important;
        border-color: #FEDD31 !important;
        transition: 0.5s;
        padding: 10px 20px;
        .fa-arrow-right{
            margin-left: 10px;
        }
        &:hover, &:focus, &:active{
            background: rgb(253,13,27) !important;
            border-color: #fff;
            transition: 0.5s;
        }
    }
</style>
</html>
