<template>
    <div class="container login-form">
        <form class="row g-2">
            <h2 class="col-sm-12 text-center">Ingresa a tu cuenta</h2>
            <p class="col-sm-12 text-center text-white">Ingresa con los datos de tu cuenta registrada para poder
agregar más códigos y participar por tus sueños.</p>
            <div class="col-sm-12 mt-5">
                <input type="email" placeholder="Correo" class="form-control" id="email">
            </div>
            <div class="col-sm-12">
                <input type="password" placeholder="Contraseña" class="form-control" id="password">
            </div>

            <div class="col-sm-12 text-center pt-5">
                <button type="submit" class="btn btn-primary">Ingresar <i class="fas fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate'
    export default {
        mixins: [validationMixin],
        data(){
            return {
                user: {
                    email: null,
                    password: null
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
