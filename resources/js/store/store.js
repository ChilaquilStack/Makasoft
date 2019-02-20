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
                
                console.log(error);
                //state.errors = error.response.error;
            
            }

        },
        
        async addUser({commit, state}, user) {

            if(state.user.id != '') {
                
                const URL = `users/${state.user.id}`;

                try {
                    
                    const {data} = await axios.post(URL, state.user);

                    commit('SET_USERS', data.data.data);
                
                } catch (error) {

                    state.errors = error.response.data.errors;

                }
                
            } else {

                const URL = 'users';
                
                try {

                    const message = await axios.post(URL, user)

                    store.dispatch('getUsers');
                    
                } catch (error) {
                    
                    state.errors = error.response.data.errors;
                
                }

            }
            
            commit('RESET_USER', new User());
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