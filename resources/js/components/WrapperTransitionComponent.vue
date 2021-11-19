<template>
  <transition name="fade" appear>
    <slot></slot>
  </transition>
</template>

<script>
export default {
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.5s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>
