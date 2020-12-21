////////////////////////////////////////////////////////////////////////////////
window.axios = require('axios');
//window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
////////////////////////////////////////////////////////////////////////////////
import Vue from 'vue';
import router from './Router/index';
import store from './Store/index';
import App from './App.vue';
////////////////////////////////////////////////////////////////////////////////
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
////////////////////////////////////////////////////////////////////////////////
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
////////////////////////////////////////////////////////////////////////////////
Vue.config.productionTip = false;
////////////////////////////////////////////////////////////////////////////////
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
////////////////////////////////////////////////////////////////////////////////