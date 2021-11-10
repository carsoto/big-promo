<template>
    <div class="container d-flex flex-column align-items-center justify-content-center">
        <div class="col-md-9 m-2 pt-3 text-white bg-dark">
            <p>Selecciona tu presentación y registra
            el código de tu tapa dorada BIG
            </p>
        </div>

        <div class="col-md-8 m-2 pt-3 d-flex align-items-center justify-content-between">
            <img src="/img/1.svg" alt="">
            <img src="/img/2.svg" alt="">
            <img src="/img/3.svg" alt="">
            <img src="/img/4.svg" alt="">
            <img src="/img/5.svg" alt="">
        </div>
        <div class="col-md-8 m-2 pt-3 d-flex flex-column align-items-center justify-content-center">
            <input type="text" v-model="code" class="form-control input-bigpromo" placeholder="Escribe el codigo aqui">
            <button type="button" class="btn btn-primary mt-3 mb-3">Canjear <i class="fas fa-arrow-right"></i></button>

            <div class="rounded border border-white points-total p-3 mt-5 text-white text">
                Total de puntos: 600
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                code:null
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
