<template>
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div class="content-exchange" v-if="false">
            <div class="rounded col-md-9 m-2 text-white bg-black dialog-exchange">
                <h5 class="font-weight-bold p-3 m-0">Selecciona tu presentación y registra
                el código de tu tapa dorada BIG
                </h5>
                <img class="tapita-exchange" src="/img/Tapita.png" alt="">
            </div>

            <div class="col-md-8 m-2 pt-3 d-flex align-items-center justify-content-between">
                <a href="#" @click="selectPresentation('p-1')" ref="p-1" class="bot-presentation"><img src="/img/1.svg" alt=""></a>
                <a href="#" @click="selectPresentation('p-2')" ref="p-2" class="bot-presentation"><img src="/img/2.svg" alt=""></a>
                <a href="#" @click="selectPresentation('p-3')" ref="p-3" class="bot-presentation"><img src="/img/3.svg" alt=""></a>
                <a href="#" @click="selectPresentation('p-4')" ref="p-4" class="bot-presentation"><img src="/img/4.svg" alt=""></a>
                <a href="#" @click="selectPresentation('p-5')" ref="p-5" class="bot-presentation"><img src="/img/5.svg" alt=""></a>
            </div>
            <div class="col-md-8 m-2 pt-3 d-flex flex-column align-items-center justify-content-center">
                <input type="text" v-model="code" class="form-control input-bigpromo text-center" placeholder="Ingresar código">
                <button type="button" @click="sendCode()" class="btn btn-primary mt-3 mb-3">Canjear <i class="fas fa-arrow-right"></i></button>

                <div class="rounded border border-white points-total p-3 mt-5 text-white text">
                    Total de puntos: 600
                </div>
            </div>
            <modal-component :title="notification.title" :subtitle="notification.subtitle" :message="notification.message" :type="notification.type" :options="notification.options" @continue="redirectTo"></modal-component>
        </div>

        <div v-else class="content-suficient-points">
            <div class="rounded col-md-9 m-2 text-white bg-black dialog-exchange">
                <h5 class="font-weight-bold p-3 m-0">Ahora tienes 20 segundos para grabar tu sueño!
                </h5>
            </div>
            <div class="col-md-8 m-2 pt-3 d-flex flex-column align-items-center justify-content-center">
                <div class="m-5 p-1 btn-record-page">
                    <a href="/recorder" class="text-dark">¡Graba tu Sueño!</a>
                </div>
                <div class="rounded border border-white points-total p-3 mt-5 text-white text">
                    Total de puntos: 600
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModalComponent from './ModalComponent';
    export default {
        components: {
            ModalComponent
        },
        data() {
            return{
                code:null,
                notification: {
                    title: '',
                    subtitle: '',
                    message: '',
                    type: '',
                    options: {

                    }
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            selectPresentation(p){
                let elements = document.getElementsByClassName('active');
                if (elements.length > 0) {
                    elements[0].classList.remove("active");
                }
                this.$refs[p].classList.add('active');
            },
            sendCode() {
                //Exchange Success
                // this.notification.type = 'success-exchange';
                // this.notification.title = '¡TU BIG HA SIDO CANJEADA!';
                // this.notification.subtitle = 'Sigue acumulando PUNTOS para que puedas grabar tu SUEÑO.'
                // $('#modal-message').modal('show');

                //Success Exchange x2
                this.notification.type = 'success-exchange-x2';
                this.notification.title = '¡FELICIDADES SOÑADOR!';
                this.notification.subtitle = 'TU BIG HA SIDO PREMIADA con el DOBLE de PUNTOS.'
                $('#modal-message').modal('show');

                //Error
                // this.notification.type = 'error';
                // this.notification.title = 'INTENTA DE NUEVO';
                // this.notification.message = 'Revisa tu código y registra correctamente el litraje de tu botella BIG o el código en la tapa amarilla.'
                //  $('#modal-message').modal('show');
                // if (code) {
                //     axios.post('/exchange', code).then(response => {

                //     }).catch(err => {

                //     })
                // }
            },
            redirectTo(url) {
                if (url) {
                    window.location.href = url;
                }
            }
        }
    }
</script>
<style scoped>
    .dialog-exchange{
        position: relative;
    }

    .tapita-exchange {
        position: absolute;
        right: -30px;
        top: -35px;
        width: 120px;
    }
</style>
