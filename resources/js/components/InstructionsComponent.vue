<template>
    <div id="modal-instructions" data-backdrop="static" data-keyboard="false" class="modal fade">
        <a href="#" @click="closeModal()" class="close-modal-btn p-3 float-right text-black"><i class="far fa-3x fa-times-circle"></i></a>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="text-center">
                <img width="300" src="/img/Slogan.png" alt="">
                <h2 class="p-3">Instrucciones</h2>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, asperiores veniam possimus ipsam ea id quidem veritatis, ipsa sapiente sequi ut aliquam tempore perspiciatis enim? Sed nostrum repudiandae consequatur nam!
                </p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, asperiores veniam possimus ipsam ea id quidem veritatis, ipsa sapiente sequi ut aliquam tempore perspiciatis enim? Sed nostrum repudiandae consequatur nam!
                </p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, asperiores veniam possimus ipsam ea id quidem veritatis, ipsa sapiente sequi ut aliquam tempore perspiciatis enim? Sed nostrum repudiandae consequatur nam!
                </p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, asperiores veniam possimus ipsam ea id quidem veritatis, ipsa sapiente sequi ut aliquam tempore perspiciatis enim? Sed nostrum repudiandae consequatur nam!
                </p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, asperiores veniam possimus ipsam ea id quidem veritatis, ipsa sapiente sequi ut aliquam tempore perspiciatis enim? Sed nostrum repudiandae consequatur nam!
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
        methods:{
            closeModal() {
                $('#modal-instructions').modal('hide');
            }
        }
    }
</script>
