<template>
  <b-row align-h="center" no-gutters>
    <b-col md="4">
      <b-form
        @submit.prevent="submitRegister"
        class="bg-light p-2 my-5 rounded"
      >
        <h3 class="text-center">Register</h3>
        <b-form-group label="Nombre de usuario" class="m-4">
          <b-form-input
            type="text"
            v-model="$v.user.userName.$model"
            :state="checkState($v.user.userName)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{userNameErrors}}</p>
        <b-form-group label="Email" class="m-4">
          <b-form-input
            type="email"
            v-model="$v.user.email.$model"
            :state="checkState($v.user.email)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{emailErrors}}</p>
        <b-form-group label="Contraseña" class="m-4">
          <b-form-input
            type="password"
            v-model="$v.user.password.$model"
            :state="checkState($v.user.password)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{passwordErrors}}</p>
        <b-form-group label="Confirmar contraseña" class="m-4">
          <b-form-input
            type="password"
            v-model="$v.user.confirmPassword.$model"
            :state="checkState($v.user.confirmPassword)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{confirmPasswordErrors}}</p>
        <div class="d-flex justify-content-end">
          <b-button variant="primary" class="m-4" type="submit"
            >Registrar</b-button
          >
        </div>
      </b-form>
      <p class="text-light">

      </p>
    </b-col>
  </b-row>
</template>
<script>
import {
  minLength,
  maxLength,
  required,
  email,
  sameAs,
} from "vuelidate/lib/validators";
export default {
  data() {
    return {
      user: {
        userName: "",
        email: "",
        password: "",
        confirmPassword: "",
      },
      errorMessageStyle : {
        class : ['mx-4 text-danger font-italic font-weight-lighter']
      }
    };
  },
  computed: {
    userNameErrors() {
      let name = this.$v.user.userName;
      if (name.$dirty) {
        if (!name.required) {
          return "Este campo es requerido";
        }
        if (!name.minLength) {
          return "Este campo de contener al menos 8 caracteres";
        }
        if (!name.maxLength) {
          return "Este campo no puede ser tan extenso";
        }
      }
    },
    emailErrors() {
      let email = this.$v.user.email;
      if (email.$dirty) {
        if (!email.required) {
          return "Este campo es requerido";
        }
        if (!email.email) {
          return "Este campo de contener un email valido!";
        }
      }
    },
    passwordErrors() {
      let password = this.$v.user.password;
      if (password.$dirty) {
        if (!password.required) {
          return "Este campo es requerido";
        }
        if (!password.minLength) {
          return "Este campo de contener al menos 8 caracteres";
        }
        if (!password.maxLength) {
          return "Este campo no puede ser tan extenso";
        }
      }
    },
    confirmPasswordErrors(){
      let confirmPassword = this.$v.user.confirmPassword;
      if (confirmPassword.$dirty) {
        if (confirmPassword.$invalid) {
          return "Las contraseñas son diferentes";
        }
      }
    }
  },
  methods: {
    submitRegister() {
      if (this.$v.$invalid) {
        return console.log("Invalido");
      }
      return console.log(this.$v);
    },
    checkState(field) {
      if (field.$dirty) {
        return field.$invalid ? false : true;
      }
      return null;
    },
    getErrorsMessage(field) {
      if (field.$dirty) {
        if (!field.required) {
          return "Este campo es requerido";
        }
      }
    },
  },
  validations: {
    user: {
      userName: {
        required,
        minLength: minLength(8),
        maxLength: maxLength(255),
      },
      email: {
        required,
        email,
      },
      password: {
        required,
        minLength: minLength(8),
        maxLength: maxLength(255),
      },
      confirmPassword: {
        sameAsPassword: sameAs("password"),
      },
    },
  },
};
</script>