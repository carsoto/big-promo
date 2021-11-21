<template>
    <div
        id="modal-message"
        data-backdrop="static"
        data-keyboard="false"
        :class="'modal fade ' + customeCss"
    >
        <a
            href="#"
            @click="closeModal()"
            class="close-modal-btn p-3 float-right text-white"
            ><i class="far fa-3x fa-times-circle"></i
        ></a>
        <div class="modal-dialog modal-dialog-centered">
            <div class="text-white text-center modal-content">
                <div class="icon-section py-3">
                    <span v-if="this.type === 'error'" class="text-danger"
                        ><i class="fas fa-3x fa-times"></i
                    ></span>
                    <span
                        v-else-if="this.type === 'success'"
                        class="text-success"
                        ><i class="fas fa-3x fa-check"></i
                    ></span>
                    <span
                        v-else-if="this.type === 'success-exchange-x2'"
                        class="d-flex justify-content-center align-items-center"
                        ><img src="/img/Tapita.png" alt="" />
                        <h3 class="text-black font-weight-bold p-3">X</h3>
                        <h1 class="text-yellow font-weight-bold p-3">2</h1>
                    </span>
                    <span v-else-if="this.type === 'success-exchange'"
                        ><img width="300" src="/img/Slogan.png" alt="" />
                    </span>
                </div>
                <h3>{{ this.title }}</h3>
                <h4>{{ this.subtitle }}</h4>
                <p>{{ this.message }}</p>
                <button
                    type="button"
                    @click="continueFn()"
                    class="btn btn-primary"
                >
                    Continuar <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "subtitle", "message", "type", "options", "url"],
    mounted() {
        //var myModal = $('#modal-message').modal('show');
    },
    computed: {
        customeCss: function () {
            let css = "";
            if (
                this.type === "success" ||
                this.type === "success-exchange-x2" ||
                this.type === "success-exchange"
            ) {
                css += "modal-success ";
            }
            return css;
        },
    },
    methods: {
        closeModal() {
            $("#modal-message").modal("hide");
        },
        continueFn() {
            $("#modal-message").modal("hide");
            if (this.type === "success") {
                if (this.url == undefined) {
                    this.$emit("continue", "/");
                } else {
                    this.$emit("continue", this.url);
                }
            } else if (
                this.type === "success-exchange" ||
                this.type === "success-exchange-x2"
            ) {
                this.$emit("continue", "/u/exchange");
            }
        },
    },
};
</script>
<style scoped>
.modal-success {
    background-color: #ee000cb6 !important;
}
.modal-content {
    background: none;
    border: none;
    justify-content: center;
    align-items: center;
}

.modal-content > .btn {
    width: 135px;
}
</style>
