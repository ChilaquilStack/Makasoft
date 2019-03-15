require('./bootstrap');

import Vue from 'vue';
import store from './store/store';
import routes from './route/index';
import VueRouter from 'vue-router';
import navbar from './components/Navbar';
import users from './components/users/index';

Vue.use(VueRouter);

const router = new VueRouter({
    routes,
    mode: 'history',
        linkActiveClass : 'active'
});


new Vue({
    store,
    router,
    el: '#app',
    components:{
        navbar,
        users
    }
});
