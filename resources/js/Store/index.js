import Vue from 'vue';
import Vuex from 'vuex';

import LoginModule from './Modules/LoginModule';
import NewsModule from './Modules/NewsModule';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules:{
        LoginModule,
        NewsModule
    }
});

export default store;