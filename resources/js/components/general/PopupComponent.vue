<template>
    <div class="popup" v-if="text">
        <span class="popuptext">{{ text }}</span>
    </div>
</template>

<script>
export default {
    props: {
        text: {
            default: null
        }
    }
}
</script>

<style scoped>
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        margin-bottom: 10px;
    }
    .popup .popuptext {
        width: fit-content;
        background-color: #000;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px;
        z-index: 1;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: -100%;
        left: 5%;
        border-width: 8px;
        border-style: solid;
        border-color: #000 transparent transparent transparent;
        transform: rotate(180deg);
    }
</style>