<template>
  <b-container fluid class="m-0 p-0 bg-dark">
    <Nav-Component />
    <router-view></router-view>
  </b-container>
</template>
<script>
import NavComponent from "./Components/Nav/NavComponent.vue";
export default {
  components: {
    NavComponent,
  },
};
</script>