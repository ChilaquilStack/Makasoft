<template>

    <div>
        <h1>
            {{'Pokemons'}}
        </h1>

        <pokemonForm/>

        <pokemonSearch/>
        
        <pokemonCard/>
        
        <pokemonPaginator :offset="3"/>

    </div>

</template>

<script>

    import pokemonForm from './pokemon-form';
    import pokemonCard from './pokemon-card';
    import pokemonSearch from './pokemon-search';
    import pokemonPaginator from './pokemon-paginator';

    export default {

            name: 'pokemon',
        
            components: {
            
                pokemonForm,
            
                pokemonCard,

                pokemonSearch,

                pokemonPaginator

            },

            methods: {
            
                getAll() {
                    this.$store.dispatch('getPokemons');
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
            
            }


    }
</script>
