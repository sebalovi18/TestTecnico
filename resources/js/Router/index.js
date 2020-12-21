import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../Views/Home.vue';
import Register from '../Views/Register.vue';
import News from '../Views/News.vue';
import MyNews from '../Views/MyNews.vue';

Vue.use(VueRouter)

const routes = [
    {
        path:'/',
        component : Home,
        name : 'home',
    },
    {
        path:'/register',
        component : Register,
        name : 'register'
    },
    {
        path:'/news',
        component : News,
        name : 'news',
        beforeEnter: (to, from, next) => {
            if(window.localStorage.getItem('access_token')) next()
            else next({name:'home'})
        },
    },
    {
        path:'/mynews',
        component : MyNews,
        name : 'mynews'
    }
];

const router = new VueRouter({
    routes,
    mode:'history'
})

export default router;