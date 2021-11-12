<template>
    <div id="modal-loading" data-backdrop="static" data-keyboard="false" class="modal fade modal-loading">
        <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-yellow" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            if (this.active)
                $('#modal-loading').modal('show');
        },
        props: ['active']
    }
</script>
<style scoped>
    .modal-loading {
        background-color: #ee000cb6!important;
    }
    .spinner-border{
        width: 5rem;
        height: 5rem;
        border-width: 6px;
    }
    .modal-content {
        background: none;
        border: none;
        justify-content: center;
        align-items: center;
    }
</style>
