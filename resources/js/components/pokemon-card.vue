<template>

    <div class="row">

        <div class="col-sm-12 col-md-3 col-xl-4 col-lg-4" v-for="pokemon in pokemons">
            
            <div class="card" style="width: 18rem;">
                
                <img :src="`img/${pokemon.picture}`" class="card-img-top" :alt="pokemon.picture" @click="show(pokemon)">
                
                <div class="card-body">
                    
                    <h5 class="card-title text-center">{{pokemon.name}}</h5>
                    
                    <p class="card-text text-center">
                        <small class="text-muted">{{pokemon.class}} / {{pokemon.level}}</small>
                    </p>
               
                </div>
                
                <div class="card-footer btn-group text-center">
                    
                    <a href="#" class="btn btn-danger" @click="remove(pokemon)">
                        <i class="fas fa-trash"></i>
                    </a>
                    
                    <a href="#" class="btn btn-warning" @click="edit(pokemon)">
                        <i class="far fa-edit"></i>
                    </a>
                
                </div>
            
            </div>
        
        </div>

        <pokemonModal :pokemon="showPokemon"/>
    
    </div>

</template>

<script>

    const modal = require('./pokemon-modal').default;

    export default {

        data(){
            return{
                showPokemon:{}
            }
        },

        components:{

            pokemonModal: modal

        },

        methods:{

            remove(pokemon) {

                this.$store.dispatch('removePokemon', {...pokemon});
                this.$store.dispatch('getPokemons');

            },

            show(pokemon){

                this.showPokemon = {...pokemon};
                $('#modal').modal();

            },

            edit(pokemon) {
                this.$store.dispatch('editPokemon', {...pokemon});
            }

        },

        computed: {

            pokemons() {
                return this.$store.getters.pokemons;
            },

            pokemon(){
                return this.$store.getters.pokemon;
            }
        },

    }
</script>

<style scope="true">

    .card-img-top{
        
        cursor: pointer;
        
        -webkit-filter: grayscale(100%);
        
        -moz-filter: grayscale(100%);
        
        -ms-filter: grayscale(100%);
        
        -o-filter: grayscale(100%);
        
        filter: grayscale(100%);	
    }

    .card-img-top:hover{

        -webkit-filter: grayscale(0);
        
        -moz-filter: grayscale(0);
        
        -ms-filter: grayscale(0);
        
        -o-filter: grayscale(0);
        
        filter: grayscale(0);

    }

</style>