<template>
    <div class="container register-form">

        <form class="row g-3">
            <h2 class="col-md-12">Registra tu informacion</h2>
            <p class="col-md-12">Debes registrar tus datos y crear tu cuenta para poder acceder y participar
                Agregando los códigos de tus tapas.</p>
            <h4 class="col-md-12">Informacion personal</h4>
            <div class="col-md-6">
                <input type="text" v-model.trim="name" class="form-control" placeholder="Nombres" aria-label="Nombres">
                <div v-if="$v.name.$dirty">
                    <div class="error" v-if="!$v.name.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" v-model="last_name" class="form-control" placeholder="Apellidos" aria-label="Apellidos">
                <div v-if="$v.last_name.$dirty">
                    <div class="error" v-if="!$v.last_name.required">Field is required</div>
                </div>
            </div>

            <div class="col-md-6">
                <input type="phone" v-model="cell_phone" placeholder="Celular" class="form-control" id="inputAddress">
                <div v-if="$v.cell_phone.$dirty">
                    <div class="error" v-if="!$v.cell_phone.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="phone" v-model="aditional_phone" placeholder="Telefono adicional" class="form-control" id="inputAddress2">
                <div v-if="$v.aditional_phone.$dirty">
                    <div class="error" v-if="!$v.aditional_phone.required">Field is required</div>
                </div>
            </div>

            <div class="col-md-6">
                <select id="inputState" v-model="city" class="form-control">
                <option selected>Ciudad</option>
                <option>...</option>
                </select>
                <div v-if="$v.city.$dirty">
                    <div class="error" v-if="!$v.city.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-6">
                <input type="date" v-model="birthdate" class="form-control" id="inputZip">
                <div v-if="$v.birthdate.$dirty">
                    <div class="error" v-if="!$v.birthdate.required">Field is required</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <h4 class="col-md-12">Informacion de cuenta</h4>
                    <div class="col-md-6">
                        <input type="email" v-model="email" placeholder="Correo" class="form-control" id="inputEmail4">
                        <div v-if="$v.email.$dirty">
                            <div class="error" v-if="!$v.email.required">Field is required</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="password" v-model="password" placeholder="Contraseña" class="form-control" id="inputPassword4">
                        <div v-if="$v.password.$dirty">
                            <div class="error" v-if="!$v.password.required">Field is required</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" v-model="terms" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Aceptar los términos y condiciones de la promoción
                </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Registrarse</button>
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
        },
        validations: {
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
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
