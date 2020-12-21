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
            v-model="$v.user.name.$model"
            :state="checkState($v.user.name)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{nameErrors}}</p>
        <!-- Errores del back si de alguna manera se saltean validacion del front -->
        <p v-bind="errorMessageStyle"
        v-for="(errors,i) in getErrors.name" :key="i"
        >
          {{errors}}
        </p>
        <!-------------------------------------------------------------------------->
        <b-form-group label="Email" class="m-4">
          <b-form-input
            type="email"
            v-model="$v.user.email.$model"
            :state="checkState($v.user.email)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{emailErrors}}</p>
        <!-- Errores del back si de alguna manera se saltean validacion del front -->
        <p v-bind="errorMessageStyle"
        v-for="(errors,i) in getErrors.email" :key="i"
        >
          {{errors}}
        </p>
        <!-------------------------------------------------------------------------->
        <b-form-group label="Contraseña" class="m-4">
          <b-form-input
            type="password"
            v-model="$v.user.password.$model"
            :state="checkState($v.user.password)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{passwordErrors}}</p>
        <!-- Errores del back si de alguna manera se saltean validacion del front -->
        <p v-bind="errorMessageStyle"
        v-for="(errors,i) in getErrors.password" :key="i"
        >
          {{errors}}
        </p>
        <!-------------------------------------------------------------------------->
        <b-form-group label="Confirmar contraseña" class="m-4">
          <b-form-input
            type="password"
            v-model="$v.user.confirmPassword.$model"
            :state="checkState($v.user.confirmPassword)"
          ></b-form-input>
        </b-form-group>
        <p v-bind="errorMessageStyle">{{confirmPasswordErrors}}</p>
        <!-- Errores del back si de alguna manera se saltean validacion del front -->
        <p v-bind="errorMessageStyle"
        v-for="(errors,i) in getErrors.password" :key="i"
        >
          {{errors}}
        </p>
        <!-------------------------------------------------------------------------->
        <div class="d-flex justify-content-end">
          <b-button variant="primary" class="m-4" type="submit"
            >Registrar</b-button
          >
        </div>
      </b-form>
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
import {mapActions , mapGetters} from 'vuex';
export default {
  data() {
    return {
      user: {
        name: "",
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
    nameErrors() {
      let name = this.$v.user.name;
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
    },
    ...mapGetters('UserRegisterModule',['getErrors'])
  },
  methods: {
    submitRegister() {
      if (!this.$v.$invalid) {
        return console.log("Invalido");
      }
      this.registerUser(this.$v.user.$model);
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
    ...mapActions('UserRegisterModule' , ['registerUser'])
  },
  validations: {
    user: {
      name: {
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