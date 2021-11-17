<template>
    <div class="container main-banner">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-xs-12 col-sm-12 left-side">
                <img src="/img/Slogan.png" id="img-slogan-main" alt="" />

                <div
                    class="d-md-none d-lg-none d-xl-none right-side"
                >
                <ImgArtMainComponent />

                </div>

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
                <ImgArtMainComponent />
            </div>
        </div>
        <video-show-component
            videoSrc="/videos/test.mp4"
        ></video-show-component>
    </div>
</template>

<script>
import VideoShowComponent from "./VideoShowComponent";
import ImgArtMainComponent from "./general/ImgArtMainComponent";
export default {
    components: {
        VideoShowComponent,
        ImgArtMainComponent
    },
    mounted() {
        //
    }
};
</script>
