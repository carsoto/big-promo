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
    </head>

    <body>
        <div id="app" class="">
            <img style="width: 25%"  src="{{ asset('img/Slogan.png') }}" alt="">
            <div class="rounded p-5 m-5" style="width: 400px; height: 450px; background: white;">
                <h4><strong>Hola {{ $name }} {{ $lastname }},</strong></h4>    
                <p style="font-size: 16px;">Gracias por registrarte en <strong>BIG Promo!</strong><p>
                <p style="font-size: 16px;">Por favor confirma tu correo electrónico.</p>
                <p style="font-size: 16px;">Para ello simplemente debes hacer click en el siguiente enlace:</p>

                <a href="{{ url('/register/verify/' . $confirmation_code) }}">
                    Click para confirmar tu email
                </a>
                <br><br><img class="text-center" style="width: 25%" src="{{ asset('img/logo.png') }}" alt="">   
                 
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
</style>
</html>
