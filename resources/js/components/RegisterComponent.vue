<template>
    <div class="container register-form">
        <form class="row g-3" v-on:submit.prevent="sendForm">
            <h2 class="col-md-12 text-center">Registra tu información</h2>
            <p class="col-md-12 text-center text-white">
                Debes registrar tus datos y crear tu cuenta para poder acceder y
                participar agregando los códigos de tus tapas.
            </p>
            <h4 class="col-md-12 sub-title">Información personal</h4>
            <div class="col-md-6">
                <input
                    type="text"
                    v-model.trim="user.name"
                    class="form-control"
                    placeholder="Nombres"
                    aria-label="Nombres"
                />
                <div v-if="$v.user.name.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.name.required"
                    >
                        Campo requerido
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <input
                    type="text"
                    v-model.trim="user.lastname"
                    class="form-control"
                    placeholder="Apellidos"
                    aria-label="Apellidos"
                />
                <div v-if="$v.user.lastname.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.lastname.required"
                    >
                        Campo requerido
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <input
                    type="phone"
                    autocomplete="off"
                    v-model.trim="user.phone"
                    placeholder="Celular"
                    class="form-control"
                    id="inputAddress"
                />
                <div v-if="$v.user.phone.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.phone.required"
                    >
                        Campo requerido
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <input
                    type="phone"
                    autocomplete="off"
                    v-model.trim="user.aditional_phone"
                    placeholder="Teléfono adicional"
                    class="form-control"
                    id="inputAddress2"
                />
                <!--<div v-if="$v.user.aditional_phone.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.aditional_phone.required"
                    >
                        Campo requerido
                    </div>
                </div>-->
            </div>

            <div class="col-md-6">
                <select
                    id="inputState"
                    v-model.trim="user.city_id"
                    class="form-control"
                >
                    <option selected disabled value="">Ciudad</option>
                    <option
                        v-bind:key="index"
                        v-for="(item, index) in cities"
                        :value="item.id"
                        >{{ item.name }}</option
                    >
                </select>
                <div v-if="$v.user.city_id.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.city_id.required"
                    >
                        Campo requerido
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <input
                    type="text"
                    placeholder="Fecha de nacimiento"
                    onfocus="(this.type='date')"
                    v-model.trim="user.birthday"
                    class="form-control"
                    max='2002-01-01'
                    id="birthday"
                />
                <div v-if="$v.user.birthday.$dirty">
                    <div
                        class="error text-warning"
                        v-if="!$v.user.birthday.required"
                    >
                        Campo requerido
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h4 class="col-md-12 sub-title">Información de cuenta</h4>
                    <div class="col-md-6">
                        <input
                            type="email"
                            autocomplete="off"
                            v-model.trim="user.email"
                            placeholder="Correo"
                            class="form-control"
                            id="inputEmail4"
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
                    <div class="col-md-6">
                        <input
                            type="password"
                            v-model.trim="user.password"
                            placeholder="Contraseña"
                            class="form-control"
                            id="inputPassword4"
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
                </div>
            </div>

            <div class="col-12">
                <div class="form-check text-center">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        v-model.trim="user.terms_conditions"
                        id="gridCheck"
                    />
                    <label
                        class="form-check-label check-text font-weight-bold"
                        for="gridCheck"
                    >
                        Aceptar los términos y condiciones de la promoción
                    </label>
                    <div v-if="$v.user.terms_conditions.$dirty">
                        <div
                            class="error text-warning"
                            v-if="!$v.user.terms_conditions"
                        >
                            Debes aceptar los términos y condiciones
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">
                    Registrarse <i class="fas fa-arrow-right"></i>
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
import { required, minLength, between, sameAs } from "vuelidate/lib/validators";
import ModalComponent from "./ModalComponent";
export default {
    mixins: [validationMixin],
    components: {
        ModalComponent
    },
    data() {
        return {
            cities: [],
            notification: {
                title: null,
                subtitle: null,
                message: null,
                type: null,
                options: {}
            },
            user: {
                name: null,
                lastname: null,
                phone: null,
                aditional_phone: null,
                city_id: "",
                birthday: null,
                email: null,
                password: null,
                terms_conditions: false
            }
        };
    },
    validations: {
        user: {
            name: {
                required
            },
            lastname: {
                required
            },
            phone: {
                required
            },
            city_id: {
                required
            },
            birthday: {
                required
            },
            email: {
                required
            },
            password: {
                required
            },
            terms_conditions: {
                sameAs: sameAs(() => true)
            }
        }
    },
    mounted() {
        this.setCities();
    },
    methods: {
        setCities() {
            axios.get("/api/cities").then(response => {
                this.cities = response.data.data;
            });
        },
        sendForm() {
            this.isSubmitting = true;
            this.$v.user.$touch();
            if (this.$v.user.$invalid) {
                console.log("upss", this.$v.user.$invalid);
                return;
            }

            $('#modal-loading').modal('show');

            axios
                .post("/api/register", this.user)
                .then(response => {
                    this.notification.type = "success";
                    this.notification.title =
                        "Hemos creado tu cuenta con éxito!";
                    this.notification.message = response.data.message;
                    $("#modal-message").modal("show");
                    $('#modal-loading').modal('hide');
                })
                .catch(err => {
                    this.notification.type = "error";
                    this.notification.title = "Ha ocurrido un error!";
                    this.notification.message = err.response.data.message;
                    $("#modal-message").modal("show");
                    $('#modal-loading').modal('hide');
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
