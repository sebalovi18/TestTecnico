<template>
  <div class="border-bottom border-light">
    <b-navbar type="dark" variant="dark" toggleable="md" class="justify-content-end">
      <b-navbar-toggle target="main-nav" class="border-0">
        <template #default="{expanded}">
          <b-icon icon="x-circle-fill" v-if="expanded" variant="light"></b-icon>
          <b-icon icon="list" v-else variant="light"></b-icon>
        </template>
      </b-navbar-toggle>
      <b-collapse id="main-nav" is-nav class="justify-content-center justify-content-md-end">
        <b-navbar-nav>
          <b-nav-item to="/">Home</b-nav-item>
          <b-nav-item to="/register">Register</b-nav-item>
          <b-nav-item to="/news">News</b-nav-item>
          <b-nav-item to="/mynews">MyNews</b-nav-item>
          <b-nav-item @click="signOut">LogOut</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>
<script>
import TOAST from '../../Mixins/Toast';
import {mapActions} from 'vuex';
export default {
  mixins:[TOAST],
  methods:{
    signOut()
    {
      this.showToast(
        'Se ha deslogueado',
        'Operacion exitosa',
        this.toastConfig.success
      )
      setTimeout(()=>{
        this.logOut();
      },2000)
    },
    ...mapActions('AuthModule' , ['logOut'])
  },
};
</script>