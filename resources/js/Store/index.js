import Vue from 'vue';
import Vuex from 'vuex';

import LoginModule from './Modules/LoginModule';
import UserRegisterModule from './Modules/UserRegisterModule';

import NewsModule from './Modules/NewsModule';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        LoginModule,
        UserRegisterModule,
        NewsModule
    }
});

export default store;