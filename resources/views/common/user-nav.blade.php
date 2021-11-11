<header>
    <div class='logo'>
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    @if(!in_array(request()->routeIs('user.home'), ['home', 'register', 'login']))
    <div class="slogan pt-2">
        <a href="/"><img src="{{ asset('img/Slogan.png') }}" alt=""></a>
    </div>
    @endif
    <nav>
        @if(true)
        <a class="sign-in" href="/login"><i class="far fa-user"></i> Iniciar Sesión</a>
        @else
        <a class="sign-out" href="/logout"><i class="far fa-user"></i> Cerrar Sesión</a>
        @endif
        <div class="nav-options">
            @if(false)
            <a href="/exchange">Canjear</a>
            <a href="/videos">Mis suenos</a>
            <a href="/history">Historial</a>
            @else
            <a href="#" data-toggle="modal" data-target="#modal-instructions" >Instrucciones</a>
            @endif
        </div>
    </nav>
</header>
