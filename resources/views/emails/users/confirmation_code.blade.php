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
        <div id="app" style="display:flex;flex-direction:column; justify-content:center; align-items:center;">
            <div style="display:flex;">
                <img style="width: 350px;margin-top:4rem;"  src="{{ asset('img/Slogan.png') }}" alt="">
            </div>
            
            <div style="max-width: 450px; min-height: 550px; background: white; margin: 0 auto;padding: 3rem;margin: 3rem;border-radius: 0.25
            rem
             !important;">
                <h4><strong>Hola {{ $name }} {{ $lastname }},</strong></h4>    
                <p style="font-size: 18px;">Gracias por registrarte en <strong>BIG Promo!</strong><p>
                <p style="font-size: 18px;">Por favor confirma tu correo electrónico.</p>
                <p style="font-size: 18px;">Para ello simplemente debes hacer click en el siguiente enlace:</p>
                
                <div style="display:flex;flex-direction:column; justify-content:center; align-items:center;margin-top: 2rem;">
                <a class="btn btn-lg btn-primary-big p-3" href="{{ url('/register/verify/' . $confirmation_code) }}">
                    Click para confirmar tu email
                </a>
                <br><br><img class="text-center" style="max-width: 90px" src="{{ asset('img/logo.png') }}" alt="">   
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
