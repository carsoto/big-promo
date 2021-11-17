<template>
    <div id="modal-video" class="modal fade" data-backdrop="static" data-keyboard="false">
        <a href="#" @click="closeModal()" class="close-modal-btn p-3 float-right text-white"><i class="far fa-3x fa-times-circle"></i></a>
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-dark">
                <video width="100%" height="450" controls>
                    <source :src="videoSrc" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'videoSrc'
        ],
        mounted() {
            //
        },
        methods:{
            closeModal() {
                $('#modal-video').modal('hide');
            }
        }
    }
</script>
