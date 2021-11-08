<header>
    <div class='logo'>
        <img src="{{ asset('img/logo.png') }}" alt="">
    </div>
    <nav>
        @if(true)
        <a class="sign-in" href="#">Iniciar session</a>
        @else
        <a class="sign-out" href="#">Cerrar session</a>
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
