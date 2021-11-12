<template>
    <div class="container main-banner">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-xs-12 col-sm-12 left-side">
                <img src="/img/Slogan.png" alt="" />
                <a href="u/register" class="btn btn-primary py-3 mt-3"
                    >Comenzar <i class="fas fa-arrow-right"></i
                ></a>
                <a href="u/login" class="btn btn-secondary py-3 px-3 mt-3"
                    >Ya tengo cuenta</a
                >
            </div>

            <div
                class="col-lg-6 col-xs-12 col-sm-12 d-none d-sm-none d-md-block right-side"
            >
                <img src="/img/arte-principal.png" alt="" />
            </div>
        </div>
        <video-show-component
            videoSrc="/videos/test.mp4"
        ></video-show-component>
    </div>
</template>

<script>
import VideoShowComponent from "./VideoShowComponent";
export default {
    components: {
        VideoShowComponent
    },
    mounted() {
        setTimeout(() => {
            $('#modal-loading').modal('hide');
        },800);
    }
};
</script>
