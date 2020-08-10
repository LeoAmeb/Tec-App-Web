<template>
  <div>
    <transition name="slide-fade">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
import GoogleMap from "./components/GoogleMap.vue";

export default {
  name: "mapa",
  components: {
    GoogleMap
  }
};
</script>