<template>
<div>
    <div class="float-help-button">
        <a class="rounded m-1 p-3" style="font-size: 14px;" href="#" data-toggle="modal" data-target="#modal-help" >
            <span>¿Necesitas ayuda?</span> <img src="/img/ayuda.svg" alt="" />
        </a>
   </div>

    <div
        id="modal-help"
        data-backdrop="static"
        data-keyboard="false"
        class="modal fade"
    >
        <a
            href="#"
            @click="closeModal()"
            class="close-modal-btn p-3 float-right text-white"
            ><i class="far fa-3x fa-times-circle"></i
        ></a>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="text-center">
                <!--<img width="300" src="/img/Slogan.png" alt="">-->
                <h2 class="p-2">AYUDA</h2>
                <br />
            </div>
            <div class="text-justify">
                <p>
                    Si has tenido algun problema con el registro de códigos, grabación de video o con nuestra plataforma en general, 
                    escríbenos tu caso a: <a href="mailto:bigpromoecuador@gmail.com" class="link-yellow">bigpromoecuador@gmail.com</a> / 
                    <a href="mailto:soporte@bigpromo.ec" class="link-yellow">soporte@bigpromo.ec</a>
                </p>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    methods: {
        closeModal() {
            $("#modal-help").modal("hide");
        },
    },
}
</script>

<style scoped>
#modal-help {
    background: rgb(253, 13, 27);
    background: radial-gradient(
        circle,
        rgba(253, 13, 27, 1) 0%,
        rgba(172, 3, 13, 1) 100%
    );
    color: white;
}
</style>