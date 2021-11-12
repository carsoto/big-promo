<template>
    <div class="container login-form">
        <form class="row g-2" v-on:submit.prevent="sendForm">
            <h2 class="col-sm-12 text-center">Ingresa a tu cuenta</h2>
            <p class="col-sm-12 text-center text-white">
                Ingresa con los datos de tu cuenta registrada para poder agregar
                más códigos y participar por tus sueños.
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
                        Campo requerido
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
                        Campo requerido
                    </div>
                </div>
            </div>

            <div class="col-sm-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">
                    Ingresar <i class="fas fa-arrow-right"></i>
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

export default {
    mixins: [validationMixin],
    components: {
        ModalComponent
    },
    data() {
        return {
            user: {
                email: null,
                password: null
            },
            notification: {
                title: null,
                subtitle: null,
                message: null,
                type: null,
                options: {}
            }
        };
    },
    validations: {
        user: {
            email: {
                required
            },
            password: {
                required
            }
        }
    },
    mounted() {
        setTimeout(() => {
            $('#modal-loading').modal('hide');
        },800);
    },
    methods: {
        sendForm() {
            this.isSubmitting = true;
            this.$v.user.$touch();
            if (this.$v.user.$invalid) {
                console.log("upss", this.$v.user.$invalid);
                return;
            }

            axios
                .post("/api/login", this.user)
                .then(response => {
                    if (response.data.success) {
                        this.redirectTo("exchange");
                    } else {
                        this.notification.type = "error";
                        this.notification.title = "Ha ocurrido un error!";
                        this.notification.message = response.data.message;
                        $("#modal-message").modal("show");
                    }
                })
                .catch(err => {
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
        }
    }
};
</script>
