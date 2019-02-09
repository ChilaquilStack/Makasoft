<template>
    
    <div>
        
        <pokemonForm/>

        <pokemonSearch/>
        
        <pokemonCard/>
        
        <pokemonPaginator :offset="3"></pokemonPaginator>

    
    </div>

</template>

<script>

    import axios from 'axios';
    import Swal from 'sweetalert2';
    import pokemonForm from './pokemon-form';
    import pokemonCard from './pokemon-card';
    import pokemonSearch from './pokemon-search';
    import pokemonPaginator from './pokemon-paginator';

    export default {

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
        
        },

        components: {
            
            'pokemonForm': pokemonForm,
            
            'pokemonCard': pokemonCard,

            'pokemonSearch': pokemonSearch,

            'pokemonPaginator': pokemonPaginator
        
        }

    }

</script>