<template>
    <div class="container register-form">

        <form class="row g-3">
            <h2 class="col-md-12 text-center">Registra tu informacion</h2>
            <p class="col-md-12 text-center text-white">Debes registrar tus datos y crear tu cuenta para poder acceder y participar
                Agregando los códigos de tus tapas.</p>
            <h4 class="col-md-12 sub-title">Informacion personal</h4>
            <div class="col-md-6">
                <input type="text" v-model.trim="user.name" class="form-control" placeholder="Nombres" aria-label="Nombres">
                <div v-if="$v.user.name.$dirty">
                    <div class="error" v-if="!$v.user.name.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" v-model.trim="user.last_name" class="form-control" placeholder="Apellidos" aria-label="Apellidos">
                <div v-if="$v.user.last_name.$dirty">
                    <div class="error" v-if="!$v.user.last_name.required">Field is required</div>
                </div>
            </div>

            <div class="col-md-6">
                <input type="phone" v-model.trim="user.cell_phone" placeholder="Celular" class="form-control" id="inputAddress">
                <div v-if="$v.user.cell_phone.$dirty">
                    <div class="error" v-if="!$v.user.cell_phone.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="phone" v-model.trim="user.aditional_phone" placeholder="Telefono adicional" class="form-control" id="inputAddress2">
                <div v-if="$v.user.aditional_phone.$dirty">
                    <div class="error" v-if="!$v.user.aditional_phone.required">Field is required</div>
                </div>
            </div>

            <div class="col-md-6">
                <select id="inputState" v-model.trim="user.city" class="form-control">
                <option selected>Ciudad</option>
                <option>...</option>
                </select>
                <div v-if="$v.user.city.$dirty">
                    <div class="error" v-if="!$v.user.city.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="date" v-model.trim="user.birthdate" class="form-control" id="inputZip">
                <div v-if="$v.user.birthdate.$dirty">
                    <div class="error" v-if="!$v.user.birthdate.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h4 class="col-md-12 sub-title">Informacion de cuenta</h4>
                    <div class="col-md-6">
                        <input type="email" v-model.trim="user.email" placeholder="Correo" class="form-control" id="inputEmail4">
                        <div v-if="$v.user.email.$dirty">
                            <div class="error" v-if="!$v.user.email.required">Field is required</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="password" v-model.trim="user.password" placeholder="Contraseña" class="form-control" id="inputPassword4">
                        <div v-if="$v.user.password.$dirty">
                            <div class="error" v-if="!$v.user.password.required">Field is required</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check text-center">
                    <input class="form-check-input" type="checkbox" v-model.trim="user.terms" id="gridCheck">
                    <label class="form-check-label check-text" for="gridCheck">
                        Aceptar los términos y condiciones de la promoción
                    </label>
                </div>
            </div>
            <div class="col-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">Registrarse <i class="fas fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate';
    import { required, minLength, between } from 'vuelidate/lib/validators'
    export default {
        mixins: [validationMixin],
        data(){
            return {
                user: {
                    name: null,
                    last_name: null,
                    cell_phone: null,
                    aditional_phone: null,
                    city: null,
                    birthdate: null,
                    email: null,
                    password: null,
                    terms: null
                }
            }
        },
        validations: {
            user: {
                name: {
                    required
                },
                last_name: {
                    required
                },
                cell_phone: {
                    required
                },
                aditional_phone: {
                    required
                },
                city: {
                    required
                },
                birthdate: {
                    required
                },
                email: {
                    required
                },
                password: {
                    required
                },
                terms: {
                    required
                }
            }
        },
        mounted() {
            this.getCities();
        },
        methods:{
            getCities() {
                axios.get('/api/cities').then(response => {
                    console.log(response.data)
                })
            },
            sendForm() {
                this.isSubmitting = true;
                this.$v.user.$touch();
                if (this.$v.user.$invalid) {
                    console.log('upss')
                    return;
                }
            }
        }
    }
</script>
