<header >
    <div class="row">
        @if(!in_array(request()->routeIs('user.home'), ['home', 'u/register', 'u/login']))
        <div class='logo col-6 col-md-4'>
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>

        <div class="slogan pt-2 col-6 col-md-4 text-center">
            @if(auth()->user() == null)
            <a href="/"><img src="{{ asset('img/Slogan.png') }}" alt=""></a>
            @else
            <a href="/u/exchange"><img src="{{ asset('img/Slogan.png') }}" alt=""></a>
            @endif
        </div>
        <nav class="col-12 col-md-4">
        @else
        <div class='logo col-6 col-md-6'>
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <nav class="col-12 col-md-6 float-right">
        @endif

            @if(!auth()->check())
            <a class="sign-in" href="/u/login"><i class="far fa-user"></i> Iniciar Sesión</a>
            @else
            <div style="border-bottom: 1px solid white;">
                <label style="color: white"><strong>Hola, {{ auth()->user()->fullName() }}</strong> | <a class="sign-out" href="#" onclick="document.getElementById('logout-form').submit();"><i class="far fa-user"></i> Cerrar Sesión</a></label>
            </div>
            <div class="flex mt-1"><label class="m-1" style="color: white; font-size: 16px;"><strong>Puntos Acumulados: </strong></label><label class="text-yellow" style="font-size: 16px;"><strong>{{ auth()->user()->accumulated }}</strong></label></div>
            <form id="logout-form" action="/logout" method="POST">
                {{ csrf_field() }}
            </form>
            @endif
            <div class="nav-options d-flex flex-row">
                @if(auth()->user())
                <a class="rounded m-1 p-2" href="/u/exchange">Canjear</a>
                <a class="rounded m-1 p-2" href="/u/videos-gallery">Mis sueños</a>
                <a class="rounded m-1 p-2" href="/u/history">Historial</a>
                @else
                <a class="rounded m-1 p-2" href="#" data-toggle="modal" data-target="#modal-instructions" >Instrucciones</a>
                @endif
            </div>
        </nav>
    </div>
</header>
