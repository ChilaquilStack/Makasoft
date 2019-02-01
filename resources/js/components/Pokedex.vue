<template>
    
    <div>
        
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
    
    </div>

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
                
                pokemons: [],

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
            
            getAll(){

                const url = `pokemons?page=${this.pagination.current_page}`;

                axios
                .get(url)
                .then(response => {
                    this.pokemons = response.data.data.data;
                    this.pagination = response.data.pagination;
                })
                .catch(e => console.log(e));

            },

            changePage(page) {

                this.pagination.current_page = page;
                this.getAll();

            },

            search(pokemons) {
                if(!pokemons.length){
                    this.getAll()
                } else {
                    this.pokemons = pokemons;
                }
            },

            remove(pokemon) {
                
                const url = `pokemons/${pokemon.id}`
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios
                        .delete(url)
                        .then(response => {
                            this.alert('success');
                            this.getAll();
                        })
                        .catch(e => console.log(e));
                    }
                })

            
            },

            edit(pokemon){

                this.pokemon = Object.assign({},pokemon);

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
        
        }

    }

</script>