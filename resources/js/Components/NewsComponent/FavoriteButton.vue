<template>
    <b-icon 
    v-bind="state" 
    @click="flag = !flag" 
    class="overIcon"
    v-b-popover.hover.top = "popOverMessage"
    >
    </b-icon>
</template>
<script>
export default {
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
    state : function() {
      if (this.flag) {
        return this.selected;
      }
      return this.unselected;
    },
    popOverMessage : function(){
        if(this.flag){
            return "Quitar de favoritos"
        }
        return "Agregar a favoritos"
    }
  },
};
</script>
<style scoped>
.overIcon{
    cursor: pointer;
}
</style>