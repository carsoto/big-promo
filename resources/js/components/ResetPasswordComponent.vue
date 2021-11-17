<template>
    <div class="container login-form">
        <form class="row g-2" v-on:submit.prevent="sendForm">
            <h2 class="col-sm-12 text-center">Cambiar contraseña</h2>
            <p class="col-sm-12 text-center text-white">
                Ingresa con los datos de tu cuenta registrada para poder recuperar tu contraseña y sigas canjeando tus tapas BIG.
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
            <div class="col-sm-12">
                <input
                    type="password"
                    placeholder="Contraseña"
                    class="form-control"
                    id="password"
                    v-model.trim="user.password"
                />
                
                <div v-if="$v.user.password.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.password.required"
                    >
                        <PopupComponent text="Campo requerido" />

                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <input
                    type="password"
                    placeholder="Repetir contraseña"
                    class="form-control"
                    id="password"
                    v-model.trim="user.password_confirm"
                />
                
                <div v-if="$v.user.password_confirm.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.password_confirm.required"
                    >
                        <PopupComponent text="Campo requerido" />

                    </div>
                </div>
            </div>

            <div class="col-sm-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">
                    Cambiar <i class="fas fa-arrow-right"></i>
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
    props: ["token"],
    components: {
        ModalComponent,
        PopupComponent
    },
    data() {
        return {
            user: {
                email: null,
                password: null,
                password_confirm: null,
                token: null
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
            },
            password: {
                required,
            },
            password_confirm: {
                required,
            },
        },
    },
    mounted() {
        //
    },
    methods: {
        sendForm() {
            this.isSubmitting = true;
            this.$v.user.$touch();
            if (this.$v.user.$invalid) {
                console.log("upss", this.$v.user.$invalid);
                return;
            }
            this.user.token = this.token;
            console.log(this.user, this.token);
            axios
                .post("/api/reset-password", this.user, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                })

                .then((response) => {
                    if (response.data.success) {
                        this.redirectTo("exchange");
                    } else {
                        this.notification.type = "error";
                        this.notification.title = "Ha ocurrido un error!";
                        this.notification.message = response.data.message;
                        $("#modal-message").modal("show");
                    }
                })
                .catch((err) => {
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
