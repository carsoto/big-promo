<template>
    <div class="container">
        <h2 class="text-center p-3">Galería de sueños</h2>
        <carousel
            :scrollPerPage="true"
            :perPageCustom="[
                [300, 1],
                [768, 3],
            ]"
        >
            <slide
                class="p-3"
                v-bind:key="index"
                v-for="(item, index) in videos"
                ><video width="100%" controls>
                    <source :src="item.dream" type="video/webm" /></video
            ></slide>
        </carousel>

        <video-show-component :videoSrc="selectedVideo"></video-show-component>
    </div>
</template>

<script>
import VideoShowComponent from "./VideoShowComponent.vue";
import { Carousel, Slide } from "vue-carousel";
export default {
    components: {
        Carousel,
        Slide,
        VideoShowComponent,
    },
    data() {
        return {
            videos: [],
            selectedVideo: "/videos/test.mp4",
        };
    },
    mounted() {
        this.setVideos();
        setTimeout(() => {
            $("#modal-loading").modal("hide");
        }, 800);
    },
    methods: {
        setVideos() {
            axios.get("/api/dreams").then((response) => {
                this.videos = response.data.data;
            });
        },
        buildSlideMarkup(count) {
            let slideMarkup = "";
            for (var i = 1; i <= count; i++) {
                slideMarkup +=
                    '<slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>';
            }
            return slideMarkup;
        },
    },
};
</script>
