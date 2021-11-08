<template>
    <div class="container main-banner">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-xs-12 col-sm-12 left-side">
                <img src="/img/Slogan.png" alt="">
                <button type="button" class="btn btn-primary">Comenzar <i class="fas fa-arrow-right"></i></button>
                <button type="button" class="btn btn-secondary">Ya tengo cuenta</button>
            </div>

            <div class="col-lg-6 col-xs-12 col-sm-12 right-side">
                <img src="/img/arte-principal.png" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
