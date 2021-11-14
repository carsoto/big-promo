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
        <div id="app">
            <h2>Hola {{ $name }} {{ $lastname }}, gracias por registrarte en <strong>BIG Promo</strong> !</h2>
            <p>Por favor confirma tu correo electrónico.</p>
            <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>

            <a href="{{ url('/register/verify/' . $confirmation_code) }}">
                Click para confirmar tu email
            </a>
        </div>
    </body>
</html>