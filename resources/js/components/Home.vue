<template>
    
    <section>
        
        <pokemonForm/>
        
        <pokemonSearch/>
        
        <pokemonCard/>
        
        <pokemonPaginator
            :offset='3'
        />
    
    </section>

</template>

<script>

    import pokemonForm from './form';
    import pokemonCard from './panel';
    import pokemonSearch from './search';
    import pokemonPaginator from './paginator';

    export default {

        methods: {

            changePage(page) {

                this.$store.dispatch('changePage', page);

            },

            remove(pokemon) {
                
                this.$store.dispatch('removePokemon', pokemon);
            
            },

            edit(pokemon){

                this.$store.dispatch('editPokemon', pokemon);

            }

        },


        mounted() {
            
            this.$store.dispatch('getPokemons');
        
        },

        components:{
            
            pokemonForm,
            
            pokemonCard,

            pokemonSearch,

            pokemonPaginator
        
        },

        computed: {
            pokemons() {
                return this.$store.getters.pokemons;
            }
        }

    }

</script>