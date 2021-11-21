<template>
    <div class="container d-flex flex-column align-items-center">
        <div class="rounded text-white bg-black dialog-exchange">
            <h5 class="p-3 m-0 text-center">
                GRABA TU SUEÑO EN 20 SEGUNDOS INDICANDO...
                <br />
                <b class="font-weight-bold"
                    >¿CUÁL ES TU SUEÑO y POR QUÉ DEBEMOS HACERLO REALIDAD?</b
                >
            </h5>
        </div>

        <div class="flex-column align-items-center justify-content-center">
            <button
                type="button"
                class="btn btn-outline-warning"
                id="btnUploadFile"
                style="margin-bottom: 15px"
            >
                <label class="m-1" for="my-file-dream">
                    <img
                        src="/img/btn-upload-1.svg"
                        alt=""
                        width="22px"
                        class="mr-3"
                    />
                    CARGAR DESDE TU DISPOSITIVO
                </label>
                <form @submit="submitVideoFile" enctype="multipart/form-data">
                    <input
                        type="file"
                        class="form-control"
                        id="my-file-dream"
                        style="display: none"
                        v-on:change="onFileChange"
                    />
                    <div v-if="file">
                        <label class="text-white">{{ file.name }}</label>
                        <br /><button
                            class="btn btn-sm btn-recorder btn-success"
                        >
                            Enviar
                            <img
                                src="/img/btn-send.svg"
                                alt=""
                                width="15px"
                                class="ml-1"
                            />
                        </button>
                    </div>
                </form>
            </button>
        </div>
        <div class="col-10 col-md-7 d-flex flex-column">
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
            <div
                class="d-flex justify-content-between buttons-section-record"
                v-if="!file"
            >
                <button
                    type="button"
                    class="btn btn-recorder btn-info"
                    @click.prevent="startRecording()"
                    v-bind:disabled="isStartRecording"
                    id="btnStart"
                >
                    <img
                        src="/img/btn-record.svg"
                        alt=""
                        width="22px"
                        class="mr-3"
                    />
                    Grabar
                </button>
                <button
                    type="button"
                    class="btn btn-recorder btn-success"
                    @click.prevent="submitVideo()"
                    v-bind:disabled="isSaveDisabled"
                    id="btnSave"
                >
                    Enviar
                    <img
                        src="/img/btn-send.svg"
                        alt=""
                        width="22px"
                        class="ml-3"
                    />
                </button>
                <button
                    type="button"
                    class="btn btn-recorder btn-primary"
                    @click.prevent="retakeVideo()"
                    v-bind:disabled="isRetakeDisabled"
                    id="btnRetake"
                >
                    Re-Grabar
                    <img
                        src="/img/btn-re-record.svg"
                        alt=""
                        width="22px"
                        class="ml-3"
                    />
                </button>
            </div>
        </div>
        <modal-component
            :title="notification.title"
            :subtitle="notification.subtitle"
            :message="notification.message"
            :type="notification.type"
            :options="notification.options"
            :url="notification.url"
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
                        /*pip: false,
                        audio: true,
                        video: true,
                        maxLength: 20,
                        debug: true,*/

                        audio: true,
                        video: true,
                        maxLength: 20,
                        debug: true,
                        displayMilliseconds: false,
                        videoMimeType: "video/webm;codecs=H264",
                        videoRecorderType: "auto",
                        videoFrameRate: 25,
                        videoEngine: "recordrtc",
                        convertEngine: "ffmpeg.js",
                        convertOptions: [
                            "-f",
                            "mp4",
                            "-codec:a",
                            "aac",
                            "-codec:v",
                            "libx264",
                        ],
                        pluginLibraryOptions: {
                            outputType: "video/mp4",
                        },
                    },
                },
            },
            notification: {
                title: "",
                subtitle: "",
                message: "",
                type: "",
                options: {},
                url: null,
            },
            file: "",
            success: "",
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
            // if (this.retake == 0) {
            this.isRetakeDisabled = false;
            // }
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
            $("#modal-loading").modal("show");
            this.isSaveDisabled = true;
            this.isRetakeDisabled = true;
            var data = this.player.recordedData;
            var formData = new FormData();
            formData.append("video", data, data.name);
            this.submitText = "Uploading " + data.name;
            console.log("uploading recording:", data.name);
            this.player.record().stopDevice();
            fetch(this.uploadurl, {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                contentType: "multipart/form-data", // changed this
                dataType: "json",
                crossDomain: true, // for CORS policy error
            })
                .then((success) => {
                    $("#modal-loading").modal("hide");
                    console.log("recording upload complete.");
                    this.submitText = "Upload Complete";
                    this.notification.type = "success";
                    this.notification.title = "¡TU SUEÑO HA SIDO ENVIADO!";
                    this.notification.subtitle =
                        "Sigue acumulando PUNTOS para que puedas grabar otro SUEÑO.";
                    $("#modal-message").modal("show");
                })
                .catch((error) => {
                    $("#modal-loading").modal("hide");
                    console.error("an upload error occurred!");
                    this.submitText = "Upload Failed";
                    this.notification.type = "error";
                    this.notification.title = "INTENTA DE NUEVO";
                    this.notification.message =
                        "Ocurrió un error subiendo tu sueño.";
                    $("#modal-message").modal("show");
                });
        },

        retakeVideo() {
            //this.isSaveDisabled = true;
            //this.isRetakeDisabled = true;
            //this.retake += 1;
            this.player.record().start();
        },

        redirectTo(url) {
            if (url) {
                window.location.href = url;
            }
        },

        onFileChange(e) {
            //console.log(e.target.files[0]);
            this.file = e.target.files[0];
        },
        submitVideoFile(e) {
            $("#modal-loading").modal("show");
            e.preventDefault();
            //let currentObj = this;

            const config = {
                headers: { "content-type": "multipart/form-data" },
            };

            let formData = new FormData();
            formData.append("file", this.file);

            axios
                .post("/api/upload-dream-video", formData, config)
                .then((response) => {
                    $("#modal-loading").modal("hide");
                    if (response.data.success == true) {
                        //currentObj.success = response.data.success;
                        this.notification.type = "success";
                        this.notification.url = "/u/videos-gallery";
                        this.notification.title = "¡TU SUEÑO HA SIDO ENVIADO!";
                        this.notification.subtitle =
                            "Sigue acumulando PUNTOS para que puedas grabar otro SUEÑO.";
                        $("#modal-message").modal("show");
                        this.file = "";
                    } else {
                        //currentObj.success = response.data.success;
                        this.notification.type = "error";
                        this.notification.url = "/";
                        this.notification.title =
                            "¡TU VIDEO SUPERA EL TAMAÑO PERMITIDO!";
                        this.notification.subtitle =
                            "El archivo debe pesar menos de 10 MB";
                        $("#modal-message").modal("show");
                        this.file = "";
                    }
                })
                .catch((error) => {
                    //currentObj.output = error;
                });
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
.btn-recorder {
    background-color: yellow;
    border: none;
    padding: 15px 25px;
    font-weight: bold;
    color: black;
    cursor: pointer;
}
.btn-outline-warning {
    padding: 12px 8px !important;
    font-weight: bold;
    cursor: pointer;
}
.btn-outline-warning:hover {
    background-color: transparent !important;
    color: white;
    cursor: pointer;
}
</style>
