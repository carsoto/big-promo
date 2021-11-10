<footer>
    <div class="socials">
        <a href="#"><i class="fab fab-icon-social fa-facebook-f"></i></a>
        <a href="#"><i class="fab fab-icon-social fa-instagram"></i></a>
        <a href="#"><i class="fab fab-icon-social fa-twitter"></i></a>
        <a href="#"><i class="fab fab-icon-social fa-tiktok"></i></a>
        <a href="#"><i class="fab fab-icon-social fa-youtube"></i></a>
    </div>
    @if (request()->routeIs('user.home'))
    <div class="video-example">
        <a href="#" data-toggle="modal" data-target="#modal-video" class="d-flex flex-column justify-content-center align-items-center">Ver video
            <i class="far fa-2x fa-arrow-alt-circle-down"></i>
        </a>
    </div>
    @endif
    <div class="terms">
        <a class="" href="#">Términos y condiciones</a>
       | <a class="" href="#"><i class="fas fa-question-circle"></i> Preguntas frecuentes</a>
    </div>
</footer>
