<template>
    <div
        class="container"
    >
        <div class="content-exchange d-flex flex-column align-items-center justify-content-center" v-if="true">
            <div
                class="rounded col-md-9 m-2 text-white bg-black dialog-exchange"
            >
                <h5 class="font-weight-bold p-3 m-0">
                    Selecciona tu presentación y registra el código de tu tapa
                    dorada BIG
                </h5>
                <img class="tapita-exchange" src="/img/Tapita.png" alt="" />
            </div>

            <div
                class="col-md-8 m-2 pt-3 d-flex align-items-end justify-content-between"
            >
                <a
                    href="#"
                    @click="selectPresentation('300')"
                    ref="300"
                    class="bot-presentation d-flex justify-content-center flex-column align-items-center"
                    >
                    <img src="/img/1.svg" alt=""/>
                    <label for="" class="font-weight-bold text-white">300 ml</label>
                </a>
                <a
                    href="#"
                    @click="selectPresentation('911')"
                    ref="911"
                    class="bot-presentation d-flex justify-content-center flex-column align-items-center"
                    ><img src="/img/2.svg" alt=""
                /><label for="" class="font-weight-bold text-white">911 ml</label></a>
                <a
                    href="#"
                    @click="selectPresentation('1800')"
                    ref="1800"
                    class="bot-presentation d-flex justify-content-center flex-column align-items-center"
                    ><img src="/img/3.svg" alt=""
                /><label for="" class="font-weight-bold text-white">1800 ml</label></a>
                <a
                    href="#"
                    @click="selectPresentation('2250')"
                    ref="2250"
                    class="bot-presentation d-flex justify-content-center flex-column align-items-center"
                    ><img src="/img/4.svg" alt=""
                /><label for="" class="font-weight-bold text-white">2250 ml</label></a>
                <a
                    href="#"
                    @click="selectPresentation('3050')"
                    ref="3050"
                    class="bot-presentation d-flex justify-content-center flex-column align-items-center"
                    ><img src="/img/5.svg" alt=""
                /><label for="" class="font-weight-bold text-white">3050 ml</label></a>
            </div>
            <div
                class="col-md-8 m-2 pt-3 d-flex flex-column align-items-center justify-content-center"
            >
                <input
                    type="text"
                    v-model="code"
                    class="form-control input-bigpromo text-center"
                    placeholder="Ingresar código"
                />
                <button
                    type="button"
                    @click="sendCode()"
                    class="btn btn-primary mt-3 mb-3"
                >
                    Canjear <i class="fas fa-arrow-right"></i>
                </button>

                <div
                    class="rounded border border-white points-total p-3 mt-5 text-white text"
                >
                    Total de puntos: 600
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

        <div v-else class="content-suficient-points d-flex flex-column align-items-center justify-content-center">
            <div
                class="rounded col-md-9 m-2 text-white bg-black dialog-exchange"
            >
                <h5 class="font-weight-bold p-3 m-0">
                    Ahora tienes 20 segundos para grabar tu sueño!
                </h5>
            </div>
            <div
                class="col-md-8 m-2 pt-3 d-flex flex-column align-items-center justify-content-center"
            >
                <div class="m-5 p-1 btn-record-page">
                    <a href="/u/recorder" class="text-dark">¡Graba tu Sueño!</a>
                </div>
                <div
                    class="rounded border border-white points-total p-3 mt-5 text-white text"
                >
                    Total de puntos: 600
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ModalComponent from "./ModalComponent";
export default {
    components: {
        ModalComponent
    },
    data() {
        return {
            code: null,
            bot_presentation: null,
            notification: {
                title: "",
                subtitle: "",
                message: "",
                type: "",
                options: {}
            }
        };
    },
    mounted() {
        setTimeout(() => {
            $('#modal-loading').modal('hide');
        },800)
    },
    methods: {
        selectPresentation(p) {
            let elements = document.getElementsByClassName("active");
            if (elements.length > 0) {
                elements[0].classList.remove("active");
            }
            this.$refs[p].classList.add("active");

            this.bot_presentation = p;
        },
        sendCode() {
            if (this.code && this.bot_presentation) {
                axios.post('/api/exchange', {code: this.code, bot_presentation: this.bot_presentation}).then(response => {
                    if (response.data.success) {
                        if (response.data.data.aditional_points > 0) {
                            this.notification.type = "success-exchange-x2";
                            this.notification.title = "¡FELICIDADES SOÑADOR!";
                            this.notification.subtitle = "TU BIG HA SIDO PREMIADA con el DOBLE de PUNTOS.";
                            $("#modal-message").modal("show");
                        } else {
                            this.notification.type = 'success-exchange';
                            this.notification.title = '¡TU BIG HA SIDO CANJEADA!';
                            this.notification.subtitle = 'Sigue acumulando PUNTOS para que puedas grabar tu SUEÑO.'
                            $('#modal-message').modal('show');
                        }
                    } else {
                        this.notification.type = 'error';
                        this.notification.title = 'INTENTA DE NUEVO';
                        this.notification.message = 'Revisa tu código y registra correctamente el litraje de tu botella BIG o el código en la tapa amarilla.'
                         $('#modal-message').modal('show');
                    }
                }).catch(err => {
                    this.notification.type = 'error';
                    this.notification.title = 'INTENTA DE NUEVO';
                    this.notification.message = 'Revisa tu código y registra correctamente el litraje de tu botella BIG o el código en la tapa amarilla.'
                     $('#modal-message').modal('show');
                })
            }
        },
        redirectTo(url) {
            if (url) {
                window.location.href = url;
            }
        }
    }
};
</script>
<style scoped>
.dialog-exchange {
    position: relative;
}

.tapita-exchange {
    position: absolute;
    right: -65px;
    top: -30px;
    width: 120px;
}
</style>
