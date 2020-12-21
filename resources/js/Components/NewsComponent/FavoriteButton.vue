<template>
  <b-icon
    v-bind="state"
    @click="addOrRemoveNews"
    class="overIcon"
    v-b-popover.hover.top="popOverMessage"
  >
  </b-icon>
</template>
<script>
import { mapActions } from "vuex";
export default {
  props: {
    news: {
      type: Object,
    },
  },
  data() {
    return {
      flag: false,
      selected: {
        icon: "star-fill",
        variant: "primary",
      },
      unselected: {
        icon: "star",
        variant: "dark",
      },
    };
  },
  computed: {
    state: function () {
      if (this.flag) {
        return this.selected;
      }
      return this.unselected;
    },
    popOverMessage: function () {
      if (this.flag) {
        return "Quitar de favoritos";
      }
      return "Agregar a favoritos";
    },
  },
  methods: {
    addOrRemoveNews() {
      if(this.flag){
        this.unsetFavouriteUserNews(this.news.id);
        this.flag = !this.flag;
        return
      }
      this.setFavouriteUserNews(this.news.id);
      this.flag = !this.flag;
      return
    },
    ...mapActions("NewsModule", ["setFavouriteUserNews","unsetFavouriteUserNews"]),
  },
};
</script>
<style scoped>
.overIcon {
  cursor: pointer;
}
</style>