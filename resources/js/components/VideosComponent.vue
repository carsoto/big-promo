<template>
    <div class="container">
        <h2 class="text-center p-3">Galeria de suenos</h2>
        <carousel :scrollPerPage="true" :perPageCustom="[[480, 2], [768, 4]]">
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
            <slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>
        </carousel>
    </div>
</template>

<script>
import { Carousel, Slide } from 'vue-carousel';
export default {
    components: {
        Carousel,
        Slide
    },
    data() {
        return{

        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    methods:{
        buildSlideMarkup(count) {
            let slideMarkup = '';
            for (var i = 1; i <= count; i++) {
                slideMarkup += '<slide class="p-3"><img src="https://picsum.photos/300/300/" style="width: 300px; max-width: 100%;"></slide>'
            }
            return slideMarkup;
        }
    }
}
</script>
