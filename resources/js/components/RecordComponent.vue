<template>
    <div
        class="
            container
            d-flex
            flex-column
            align-items-center
            justify-content-center
        "
    >
        <div class="rounded col-md-9 m-2 text-white bg-black dialog-exchange">
            <h5 class="p-3 m-0 text-center">
                GRABAR TU SUEÑO EN 20 SEGUNDOS INDICANDO...
                <br />
                <b class="font-weight-bold">¿CUÁL ES TU SUEÑO y POR QUÉ DEBEMOS HACERLO REALIDAD?</b>
            </h5>
        </div>
        <div class="col-10 col-md-7 d-flex flex-column justify-content-center">
            <video id="myVideo" playsinline class="video-js vjs-default-skin">
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, or consider
                    upgrading to a web browser that
                    <a
                        href="https://videojs.com/html5-video-support/"
                        target="_blank"
                    >
                        supports HTML5 video.
                    </a>
                </p>
            </video>
            <br />
            <div class="d-flex justify-content-around buttons-section-record">
                <button
                    type="button"
                    class="btn btn-info"
                    @click.prevent="startRecording()"
                    v-bind:disabled="isStartRecording"
                    id="btnStart"
                >
                    Grabar
                </button>
                <button
                    type="button"
                    class="btn btn-success"
                    @click.prevent="submitVideo()"
                    v-bind:disabled="isSaveDisabled"
                    id="btnSave"
                >
                    Enviar
                </button>
                <button
                    type="button"
                    class="btn btn-primary"
                    @click.prevent="retakeVideo()"
                    v-bind:disabled="isRetakeDisabled"
                    id="btnRetake"
                >
                    Re-Grabar
                </button>
            </div>
        </div>
        <modal-component
            :title="notification.title"
            :subtitle="notification.subtitle"
            :message="notification.message"
            :type="notification.type"
            :options="notification.options"
            @continue="redirectTo"
        ></modal-component>
    </div>
</template>

<script>
import "video.js/dist/video-js.css";
import "videojs-record/dist/css/videojs.record.css";
import videojs from "video.js";
import "webrtc-adapter";
import RecordRTC from "recordrtc";
import Record from "videojs-record/dist/videojs.record.js";
import FFmpegjsEngine from "videojs-record/dist/plugins/videojs.record.ffmpegjs.js";
import ModalComponent from "./ModalComponent";
export default {
    props: ["uploadurl"],
    components: {
        ModalComponent,
    },
    data() {
        return {
            player: "",
            retake: 0,
            isSaveDisabled: true,
            isStartRecording: false,
            isRetakeDisabled: true,
            submitText: "Submit",
            options: {
                controls: true,
                bigPlayButton: false,
                controlBar: {
                    deviceButton: false,
                    recordToggle: false,
                    pipToggle: false,
                },
                width: 300,
                height: 180,
                fluid: true,
                plugins: {
                    record: {
                        pip: false,
                        audio: true,
                        video: true,
                        maxLength: 20,
                        debug: true,
                    },
                },
            },
            notification: {
                title: "",
                subtitle: "",
                message: "",
                type: "",
                options: {},
            },
        };
    },
    mounted() {
        this.player = videojs("myVideo", this.options, () => {
            // print version information at startup
            var msg =
                "Using video.js " +
                videojs.VERSION +
                " with videojs-record " +
                videojs.getPluginVersion("record") +
                " and recordrtc " +
                RecordRTC.version;
            videojs.log(msg);
        });
        // error handling
        this.player.on("deviceReady", () => {
            this.player.record().start();
            console.log("device ready:");
        });
        this.player.on("deviceError", () => {
            console.log("device error:", this.player.deviceErrorCode);
        });
        this.player.on("error", (element, error) => {
            console.error(error);
        });
        // user clicked the record button and started recording
        this.player.on("startRecord", () => {
            console.log("started recording!");
        });
        // user completed recording and stream is available
        this.player.on("finishRecord", () => {
            this.isSaveDisabled = false;
            if (this.retake == 0) {
                this.isRetakeDisabled = false;
            }
            // the blob object contains the recorded data that
            // can be downloaded by the user, stored on server etc.
            console.log("finished recording: ", this.player.recordedData);
        });
    },
    methods: {
        startRecording() {
            this.isStartRecording = true;
            this.player.record().getDevice();
        },
        submitVideo() {
            
            this.isSaveDisabled = true;
            this.isRetakeDisabled = true;
            var data = this.player.recordedData;
            var formData = new FormData();
            formData.append("file", data, data.name);
            this.submitText = "Uploading " + data.name;
            console.log("uploading recording:", data.name);
            this.player.record().stopDevice();
            $("#modal-loading").modal("show");

            fetch(this.uploadurl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            })
                .then((success) => {
                    console.log("recording upload complete.");
                    this.submitText = "Upload Complete";
                    this.redirectTo("videos-gallery");
                    this.notification.type = "success";
                    this.notification.title = "¡TU SUEÑO HA SIDO ENVIADO!";
                    this.notification.subtitle =
                        "Sigue acumulando PUNTOS para que puedas grabar otro SUEÑO.";
                    $("#modal-message").modal("show");
                })
                .catch((error) => {
                    console.error("an upload error occurred!");
                    this.submitText = "Upload Failed";
                    this.notification.type = "error";
                    this.notification.title = "INTENTA DE NUEVO";
                    this.notification.message =
                        "Ocurrió un error subiendo tu sueño.";
                    $("#modal-message").modal("show");
                }).finally(() => {
                    $("#modal-loading").modal("hide");
                });
        },
        retakeVideo() {
            this.isSaveDisabled = true;
            this.isRetakeDisabled = true;
            this.retake += 1;
            this.player.record().start();
        },
        redirectTo(url) {
            if (url) {
                window.location.href = url;
            }
        },
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose();
        }
    },
};
</script>

<style scoped>
.btn {
    background-color: yellow;
    border: none;
    padding: 15px 25px;
    font-weight: bold;
    color: black;
}
</style>
