<template>
    
    <section>
        
        <pokemonForm 
            @getAll="getAll" 
            :pokemon="pokemon">
        </pokemonForm>
        
        <pokemonSearch 
            @search="search">
        </pokemonSearch>
        
        <pokemonCard 
            :pokemons="pokemons" 
            @edit="edit" 
            @remove="remove">
        </pokemonCard>
        
        <pokemonPaginator
			:pagination="pagination" 
            :offset='3' 
            @changepage="changePage">
		</pokemonPaginator>
    
    </section>

</template>

<script>

    const pokemonForm = require('./pokemon-form.vue').default;
    const pokemonCard = require('./pokemon-card.vue').default;
    const pokemonSearch = require('./pokemon-search.vue').default;
    const pokemonPaginator = require('./pokemon-paginator.vue').default;
    const Swal = require('sweetalert2');
    const axios = require('axios');

    export default {

        data() {
            
            return {

                pokemon: {
                    name: '',
                    class:'',
                    level: '',
                    picture:''
                },

                pagination: {
                    total: 0, 
                    per_page: 2,
                    from: 1,
                    to: 0,
                    current_page: 1
                },
            
            }
        },

        methods: {
            
            getAll() {

                this.$store.dispatch('getPokemons');

            },

            changePage(page) {

                this.$store.dispatch('changePage', page);

            },

            search(pokemons) {
                if(!pokemons.length)
                    this.$store.dispatch('getPokemons');
                else 
                    this.pokemons = pokemons;
            },

            remove(pokemon) {
                
                this.$store.dispatch('removePokemon', pokemon);
            
            },

            edit(pokemon){

                this.$store.dispatch('editPokemon', pokemon);

            },

            alert(type) {
                Swal.fire({
                    type: type,
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        },


        mounted() {
            
            this.getAll();
        
        },

        components:{
            
            'pokemonForm': pokemonForm,
            
            'pokemonCard': pokemonCard,

            'pokemonSearch': pokemonSearch,

            'pokemonPaginator': pokemonPaginator
        
        },

        computed:{
            pokemons(){
                return this.$store.getters.pokemons;
            }
        }

    }

</script>