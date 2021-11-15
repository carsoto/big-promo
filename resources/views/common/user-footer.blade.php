<footer>
    <div class="col-12 content-footer d-flex flex-column flex-md-row justify-content-md-between align-items-center">
        @if (request()->routeIs('user.home'))
        <div class="video-example d-block d-sm-none mb-3">
            <a href="#" data-toggle="modal" data-target="#modal-video" class="d-flex flex-column justify-content-center align-items-center">Ver video
                <i class="far fa-2x fa-arrow-alt-circle-down"></i>
            </a>
        </div>
        @endif
        
    </div>
    @if (request()->routeIs('user.exchange'))
    <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $data['progress'] }}%;" aria-valuenow="{{ $data['progress'] }}" aria-valuemin="0" aria-valuemax="{{ $data['max_points'] }}">{{ $data['progress'] }}%</div>
    </div>
    @endif
    <div class="col-12 content-footer d-flex flex-column flex-md-row justify-content-md-between align-items-center">
    <div class="socials">
            <a target="_blank" href="https://www.facebook.com/RefrescoBigCola/?brand_redir=128701980519740"><i class="fab fab-icon-social fa-facebook-f"></i></a>
            <a target="_blank" href="https://www.instagram.com/big_ecuador/"><i class="fab fab-icon-social fa-instagram"></i></a>
            <!--<a href="#"><i class="fab fab-icon-social fa-twitter"></i></a>
            <a href="#"><i class="fab fab-icon-social fa-tiktok"></i></a>
            <a href="#"><i class="fab fab-icon-social fa-youtube"></i></a>-->
        </div>
        @if (request()->routeIs('user.home'))
        <div class="video-example d-none d-sm-block">
            <a href="#" data-toggle="modal" data-target="#modal-video" class="d-flex flex-column justify-content-center align-items-center">Ver video
                <i class="far fa-2x fa-arrow-alt-circle-down"></i>
            </a>
        </div>
        @endif
        <div class="terms">
            <a class="px-1" target="_blank" href="/pdf/bases.pdf">Términos y condiciones</a>
        | <a class="px-1"  href="/u/fq"><i class="fas fa-question-circle"></i> Preguntas frecuentes</a>
        </div>
    </div>
</footer>
