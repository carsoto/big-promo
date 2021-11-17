<template>
    <div
        id="modal-instructions"
        data-backdrop="static"
        data-keyboard="false"
        class="modal fade"
    >
        <a
            href="#"
            @click="closeModal()"
            class="close-modal-btn p-3 float-right text-white"
            ><i class="far fa-3x fa-times-circle"></i
        ></a>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="text-center">
                <!--<img width="300" src="/img/Slogan.png" alt="">-->
                <h2 class="p-2">Instrucciones</h2>
                <br />
                <p>
                    Para participar de la <strong>PROMOCIÓN</strong>, con la
                    cual
                    <strong>BIG COLA TE AYUDARÁ A CUMPLIR UN SUEÑO,</strong> el
                    participante deberá:
                </p>
            </div>
            <div class="text-justify">
                <ol>
                    <li>
                        Visitar la página web
                        <a href="https://www.bigpromo.ec/" target="_blank"
                            >www.bigpromo.ec</a
                        >
                    </li>
                    <li>
                        Registrarse llenando los campos requeridos (nombres y apellidos, números de contactos, ciudad y correo electrónico) 
                    </li>
                    <li>
                        Confirmar el registro de usuario a través de un correo de confirmación que llegará automáticamente al correo eletrónico registrado
                    </li>
                    <li>
                        Ingresar a la página con el usuario creado y confirmado
                    </li>
                    <li>
                        Dar click en la pestaña de canje, ingresar el código que se mostrará en las tapas de las botellas de <strong>“BIG COLA”</strong> de todos los sabores, y presentaciones de: 300ml, 911ml, 1800ml, 2250ml y 3050ml. 
                        
                    </li>
                </ol>
                <p>
                    Al ingresar los códigos se acumularán los puntos asignados a tus tapas, ciertas tapas tendrán la posibilidad de duplicar el número de puntos. Mientras más códigos escanees, más oportunidades tendrás para llenar la barra de sueño.
                </p>
                <p>
                    Una vez acumulada la cantidad de <strong
                        >cinco mil puntos</strong
                    > se llenará la barra, el usuario podrá grabar un video (máximo 20 segundos) en el que nos cuente acerca del sueño que quiera cumplir y el por qué BIG COLA debería cumplírselo, subiendo este video en la plataforma automáticamente el usuario estará participando. 
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        //
    },
    methods: {
        closeModal() {
            $("#modal-instructions").modal("hide");
        },
    },
};
</script>
<style scoped>
#modal-instructions {
    background: rgb(253, 13, 27);
    background: radial-gradient(
        circle,
        rgba(253, 13, 27, 1) 0%,
        rgba(172, 3, 13, 1) 100%
    );
    color: white;
}

ol li::marker {
    font-weight: 700;
}
</style>
