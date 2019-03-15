import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import User from '../class/User';

Vue.use(Vuex);

const store = new Vuex.Store({

    state: {
        
        users: [],
        
        user: new User(),
                
        pagination: {
            total: 0, 
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        
        errors:{}

    },
    
    mutations: {

        SET_USERS: (state, users) => state.users = users,

        RESET_USER: (state, user) => state.user = user,
        
        RESET_ERRORS: (state) => state.errors = {},

        CHANGE_PAGE: (state, page) => state.pagination.current_page = page,

        SET_PAGINATION : (state, pagination) => state.pagination = pagination
    
    },

    actions: {

        async getUsers({commit, state}) {
            
            const URL = `users?page=${state.pagination.current_page}`;
            
            try {

                const {data} = await axios.get(URL)
                
                commit('SET_USERS', data.data.data);
                
                commit('SET_PAGINATION', data.pagination);
                
            } catch (error) {

                state.errors = error.response.error;    
            
            }
            
        },

        setUsers({commit}, users) {
            commit('SET_USERS', users);
        },
        
        async removeUser({commit, state}, user) {

            const URL = `users/${user.id}`

            try {

                await axios.delete(URL);
                
                commit('RESET_USER', new User());

                store.dispatch('getUsers');
                
            } catch (error) {
                
                state.errors = error.response.error;
            
            }

        },
        
        async addUser({commit, state}, user) {

            const URL = state.user.id != '' ? `users/${state.user.id}` : 'users'; 
            
            try {
                    
                await axios.post(URL, user);

                store.dispatch('getUsers');
            
                commit('RESET_USER', new User());

                commit('RESET_ERRORS');
            
            } catch (error) {

                state.errors = error.response.data.errors;

            }

        },
        
        editUser: ({commit}, user) => {

            commit('RESET_USER', user);
        
        },
        
        changePage: ({commit}, page) => {

            commit('CHANGE_PAGE', page);
        
        },

        searchPokemons: ({commit}, users) => commit('SET_USERS', users)
    
    },

    getters: {

        errors: state => state.errors,
        
        user: state => state.user,
        
        users: state => state.users,
        
        pagination: state => state.pagination
    
    }

});

export default store;