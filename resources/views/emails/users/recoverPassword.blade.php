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
        <div id="app" style="position: relative;
        overflow-x: hidden;
        background: rgb(253,13,27);
        background: radial-gradient(circle, rgba(253,13,27,1) 0%, rgba(172,3,13,1) 100%);">
            <div style="">
                <img style="width: 350px;
                margin: auto;
                display: block;
                margin-top: 4rem;"
                src="{{ $message->embed('img/Slogan.png') }}" alt="">
            </div>
            
            <div style="max-width: 450px; min-height: 550px; background: white; margin: 0 auto;padding: 3rem;margin: 2rem auto;border-radius:5px;">
                <h4 style="font-size: 1.35rem;"><strong>Hola {{ $name }} {{ $lastname }},</strong></h4>    
                <p style="font-size: 18px;">Gracias por seguir destapando tus sueños en <strong>BIG Promo!</strong><p>
                <p style="font-size: 18px;">¿Estás seguro de recuperar tu contraseña?.</p>
                <p style="font-size: 18px;">Para ello simplemente debes hacer click en el siguiente enlace:</p>
                
                <div style="">
                    <a class="btn btn-lg btn-primary-big p-3" href="{{ url('/u/reset-password/' . $confirmation_code) }}"
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
                        Click para recuperar su contraseña
                    </a>
                    <br><br><img class="text-center" style="max-width: 90px;    margin: auto;
                    display: block;" src="{{ $message->embed('img/logo.png') }}" alt="">   
                </div>
            </div>
            
        </div>
    </body>
</html>
