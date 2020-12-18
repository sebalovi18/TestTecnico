import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../Views/Home.vue';
import Register from '../Views/Register.vue';
import News from '../Views/News.vue';

Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component : Home
    },
    {
        path:'/register',
        component : Register
    },
    {
        path:'/news',
        component : News
    }
];

const Router = new VueRouter({
    routes,
    mode:'history'
})

export default Router;