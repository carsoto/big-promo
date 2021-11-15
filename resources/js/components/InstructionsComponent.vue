<template>
    <div id="modal-instructions" data-backdrop="static" data-keyboard="false" class="modal fade">
        <a href="#" @click="closeModal()" class="close-modal-btn p-3 float-right text-danger"><i class="far fa-3x fa-times-circle"></i></a>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="text-center">
                <!--<img width="300" src="/img/Slogan.png" alt="">-->
                <h2 class="p-2">Instrucciones</h2>
                <br>
                <p>Para participar de la <strong>PROMOCIÓN</strong>, con la cual <strong>BIG COLA TE AYUDARÁ A CUMPLIR UN SUEÑO,</strong> el participante deberá:</p>
            </div>
            <div class="text-justify">
                <ol>
                    <li>Visitar la página web <a href="https://www.bigpromo.ec/" target="_blank">www.bigpromo.ec</a></li>
                    <li>Registrarse llenando los campos requeridos (nombres y apellidos, números de contactos, ciudad y correo electrónico)</li>
                    <li>Ingresar el código que se mostrará en las tapas de las botellas de <strong>“BIG COLA”</strong> todos los sabores, y presentaciones de: 300ml, 911ml, 1800ml, 2250ml y 3050ml.</li>
                </ol>
                <p>Al ingresar los códigos se acumularán puntos correspondientes a la cantidad de mililitros(ml) de la presentación del producto, mientras más códigos escanees, más oportunidades tendrás para llenar la “BARRA DE SUEÑO” y subir tu sueño a través del video.</p>
                <p>Una vez acumulada la cantidad de cinco mil de puntos para llenar la BARRA DE SUEÑO, el usuario podrá subir un video en el que grabe un sueño que quiera cumplir y el por qué AJE debería cumplírselo. El Comité Ejecutivo de Ajecuador se reserva el derecho de elección del sueño ganador semanal</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //
        },
        methods:{
            closeModal() {
                $('#modal-instructions').modal('hide');
            }
        }
    }
</script>
