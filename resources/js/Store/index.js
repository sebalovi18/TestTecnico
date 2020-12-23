import Vue from "vue";
import Vuex from "vuex";

import AuthModule from "./Modules/AuthModule";
import UserRegisterModule from "./Modules/UserRegisterModule";
import NewsModule from "./Modules/NewsModule";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        AuthModule,
        UserRegisterModule,
        NewsModule
    }
});

export default store;
