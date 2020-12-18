<template>
  <b-row align-h="center" no-gutters>
    <b-col md="4">
      <b-form @submit.prevent="submitRegister" class="bg-light my-5">
        <h3 class="text-center">Register</h3>
        <b-form-group label="Nombre" class="m-4">
          <b-form-input type="text"></b-form-input>
        </b-form-group>
        <b-form-group label="Email" class="m-4">
          <b-form-input type="email"></b-form-input>
        </b-form-group>
        <b-form-group label="Password" class="m-4">
          <b-form-input type="password"></b-form-input>
        </b-form-group>
        <b-form-group label="Confirmacion password" class="m-4">
          <b-form-input type="password"></b-form-input>
        </b-form-group>
        <div class="d-flex justify-content-end">
          <b-button variant="primary" class="m-4">Registrar</b-button>
        </div>
      </b-form>
    </b-col>
  </b-row>
</template>
<script>
export default {
  data() {
    return {};
  },
  methods: {
    submitRegister() {},
  },
};
</script>