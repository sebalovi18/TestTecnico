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
      if (this.flag == false) {
        this.setFavouriteNews({
          name: this.news.title,
          link: this.news.url,
        });
        this.flag = !this.flag;
        console.log("Agregado a favoritos");
      }
    },
    ...mapActions("NewsModule", ["setFavouriteNews"]),
  },
};
</script>
<style scoped>
.overIcon {
  cursor: pointer;
}
</style>