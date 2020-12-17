import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../Views/Home.vue';

Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component : Home
    }
];

const Router = new VueRouter({
    routes,
    mode:'history'
})

export default Router;