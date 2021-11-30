<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <img style="width: 350px;
            margin: auto;
            display: block;
            margin-top: 4rem;"
            src="{{ asset('img/Slogan.png') }}" alt="">
        
        <div style="max-width: 450px; min-height: 550px; background: white; margin: 0 auto; padding: 3rem;margin: 2rem auto;border-radius:5px;">
            <h4 style="font-size: 1.35rem;"><strong>Hola {{ $name }} {{ $lastname }},</strong></h4>    
            <p style="font-size: 18px;">Gracias por registrarte en <strong>BIG Promo!</strong><p>
            <p style="font-size: 18px;">Tu correo electrónico fue confirmado exitosamente.</p>
            <p style="font-size: 18px;">Ingresa en nuestra plataforma y canjea tus códigos:</p>
            
            <div style="">
                <a href="{{ url('/u/login') }}"
                style="color: #000 !important;
                font-weight: bold;
                background-color: #FEDD31 !important;
                border-color: #FEDD31 !important;
                transition: 0.5s;
                padding: 1rem;
                text-decoration: none;
                font-size: 1.125rem;
                line-height: 1.5;
                border-radius: 0.3rem;
                margin: auto;
                width: fit-content;
                display: block;
                text-align:center;
                ">
                    Click para iniciar sesión
                </a>

                <br><br><img class="text-center" style="max-width: 90px;    margin: auto;
                display: block;" src="{{ asset('img/logo.png') }}" alt="">   
            </div>
        </div>
    </body>
</html>
