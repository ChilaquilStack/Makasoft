require('./bootstrap');

import Vue from 'vue';
import store from './store/store';
import pokedex from './components/Pokedex';

const app = new Vue({
    store,
    el: '#app',
    components:{
        pokedex
    }
});
