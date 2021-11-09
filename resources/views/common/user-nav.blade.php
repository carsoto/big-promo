<header>
    <div class='logo'>
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    @if(!in_array(request()->routeIs('user.home'), ['home', 'register', 'login']))
    <div class="slogan pt-2">
        <img src="{{ asset('img/Slogan.png') }}" alt="">
    </div>
    @endif
    <nav>
        @if(true)
        <a class="sign-in" href="#"><i class="far fa-user"></i> Iniciar session</a>
        @else
        <a class="sign-out" href="#"><i class="far fa-user"></i> Cerrar session</a>
        @endif
        <div class="nav-options">
            @if(false)
            <a href="#">Canjear</a>
            <a href="#">Mis suenos</a>
            <a href="#">Historial</a>
            @else
            <a href="#">Instrucciones</a>
            @endif
        </div>
    </nav>
</header>
