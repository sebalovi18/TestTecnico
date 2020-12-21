<template>
  <b-row align-h="center" no-gutters>
    <b-col md="4">
      <b-form class="bg-light p-2 my-5 rounded" @submit.prevent="submitForm">
        <h3 class="text-center">Log in</h3>
        <b-input-group prepend="User" class="my-2">
          <b-form-input type="text" v-model="user.email"></b-form-input>
        </b-input-group>
        <b-input-group prepend="Pass" class="my-2">
          <b-form-input type="password" v-model="user.password"></b-form-input>
        </b-input-group>
<!-- 
        <div>
          <b-form-checkbox
            value="true"
            unchecked-value="false"
            v-model="user.remember"
            size="sm"
            class="m-2"
            switch
          >
            Remember me
          </b-form-checkbox>
        </div>
-->
        <div class="d-flex justify-content-end align-items-center">
          <b-button type="submit" variant="primary" class="m-2">
            Log in
          </b-button>
        </div>
      </b-form>
    </b-col>
  </b-row>
</template>
<script>
import {mapActions} from 'vuex';
export default {
  data() {
    return {
      user: {
        email: "",
        password: "",
        //remember: false,
      },
    };
  },
  methods:{
    submitForm(){
        this.signIn(this.user);
    },
    ...mapActions('AuthModule' , ['signIn'])
  },
};
</script>