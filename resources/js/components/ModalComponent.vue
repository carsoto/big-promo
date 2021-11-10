<template>
    <div id="modal-message" class="modal fade">
        <a href="#" @click="closeModal()" class="close-modal-btn p-3 float-right text-white"><i class="far fa-3x fa-times-circle"></i></a>
        <div class="modal-dialog modal-dialog-centered">
            <div class="text-white text-center">
                <span><i class="fas fa-3x fa-times"></i></span>
                <h3>INTENTA DE NUEVO</h3>
                <h4>Revisa tu código y registra correctamente el
litraje de tu botella BIG o el código en la tapa amarilla.</h4>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //var myModal = $('#modal-message').modal('show');
        },
        methods:{
            closeModal() {
                $('#modal-message').modal('hide');
            }
        }
    }
</script>
