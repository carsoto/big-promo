<template>
    <div class="container login-form">
        <form class="row g-2" v-on:submit.prevent="sendForm">
            <h2 class="col-sm-12 text-center">Recupera tu contraseña</h2>
            <p class="col-sm-12 text-center text-white">
                Ingresa con los datos de tu cuenta registrada para poder recuperar tu contraseña.
            </p>
            <div class="col-sm-12 mt-5">
                <input
                    type="email"
                    placeholder="Correo"
                    class="form-control"
                    id="email"
                    v-model.trim="user.email"
                />
                <div v-if="$v.user.email.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.email.required"
                    >
                        <PopupComponent text="Campo requerido" />

                    </div>
                </div>
            </div>

            <div class="col-sm-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">
                    Recuperar cuenta <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </form>
        <modal-component
            :title="notification.title"
            :subtitle="notification.subtitle"
            :message="notification.message"
            :type="notification.type"
            :options="notification.options"
            @continue="redirectTo"
        ></modal-component>
    </div>
</template>

<script>
import { validationMixin } from "vuelidate";
import { required } from "vuelidate/lib/validators";
import ModalComponent from "./ModalComponent";
import PopupComponent from "./general/PopupComponent";

export default {
    mixins: [validationMixin],
    components: {
        ModalComponent,
        PopupComponent
    },
    data() {
        return {
            user: {
                email: null
            },
            notification: {
                title: null,
                subtitle: null,
                message: null,
                type: null,
                options: {},
            },
        };
    },
    validations: {
        user: {
            email: {
                required,
            }
        },
    },
    mounted() {
        //
    },
    methods: {
        sendForm() {
            $('#modal-loading').modal('show');
            this.isSubmitting = true;
            this.$v.user.$touch();
            if (this.$v.user.$invalid) {
                $('#modal-loading').modal('hide');
                console.log("upss", this.$v.user.$invalid);
                return;
            }

            axios
                .post("/api/recover-password", this.user, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                })

                .then((response) => {
                    $('#modal-loading').modal('hide');
                    if (response.data.success) {
                        this.notification.type = "success";
                        this.notification.title = "Correo enviado!";
                        this.notification.message = response.data.message;
                        $("#modal-message").modal("show");
                    } else {
                        this.notification.type = "error";
                        this.notification.title = "Ha ocurrido un error!";
                        this.notification.message = response.data.message;
                        $("#modal-message").modal("show");
                    }
                })
                .catch((err) => {
                    $('#modal-loading').modal('hide');
                    this.notification.type = "error";
                    this.notification.title = "Ha ocurrido un error!";
                    this.notification.message = err.response.data.message;
                    $("#modal-message").modal("show");
                });
        },
        redirectTo(url) {
            if (url) {
                window.location.href = url;
            }
        },
    },
};
</script>
