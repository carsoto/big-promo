<header >
    <div class="row">
        <div class='logo col-6 col-md-4'>
            <img src="{{ asset('img/logo.png') }}" alt="">
        </div>
        @if(!in_array(request()->routeIs('user.home'), ['home', 'u/register', 'u/login']))
        <div class="slogan pt-2 col-6 col-md-4 text-center">
            <a href="/"><img src="{{ asset('img/Slogan.png') }}" alt=""></a>
        </div>
        @endif
        <nav class="col-12 col-md-4">
            @if(!auth()->check())
            <a class="sign-in" href="/u/login"><i class="far fa-user"></i> Iniciar Sesión</a>
            @else
            <label style="color: white"><strong>Hola, {{ auth()->user()->fullName() }}</strong></label>
            <a class="sign-out" href="#" onclick="document.getElementById('logout-form').submit();"><i class="far fa-user"></i> Cerrar Sesión</a>
            <form id="logout-form" action="/logout" method="POST">
                {{ csrf_field() }}
            </form>
            @endif
            <div class="nav-options">
                @if(auth()->user())
                <a class="rounded" href="/u/exchange">Canjear</a>
                <a class="rounded" href="/u/videos-galery">Mis sueños</a>
                <a class="rounded" href="/u/history">Historial</a>
                @else
                <a class="rounded" href="#" data-toggle="modal" data-target="#modal-instructions" >Instrucciones</a>
                @endif
            </div>
        </nav>
    </div>
</header>
