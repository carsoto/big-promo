<template>
    <div>
        <video
            id="video"
            class="video-js vjs-default-skin vjs-big-play-centered vjs-16-9"
            ref="videoPlayer"
            controls
            preload="auto"
            data-setup='{ "fluid": true, "preload": "auto" }'
            :poster="thumbnailUrl"
        >
        <source type="video/mp4" :src="videoUrl"></source>
        </video>
    </div>
</template>

<script>
import videojs from "video.js";

export default {
    name: "VideoPlayerComponent",
    props: {
        options: {
            type: Object,
            default() {
                return {};
            }
        },
        videoUrl: null,
        thumbnailUrl: null,
        videoUid: null
    },
    data() {
        return {
            player: null,
            duration: null
        };
    },
    mounted() {
        this.player = videojs(
            this.$refs.videoPlayer,
            this.options,
            function onPlayerReady() {
                console.log("onPlayerReady", this);
            }
        );
        this.player.on('loadedmetadata', () => {
            this.duration = Math.round(this.player.duration())
        })
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose();
        }
    }
};
</script>
