<template lang="pug">
  section
    h1 Users
    <usersForm/>
    <usersSearch/>
    <usersPanel/>
    <usersPaginator :offset="3"/>
</template>

<script>

    import usersForm from './form';
    import usersPanel from './panel';
    import usersSearch from './search';
    import usersPaginator from './paginator';

    export default {

            name: 'users',
        
            components: {
            
                usersForm,
            
                usersPanel,

                usersSearch,

                usersPaginator

            },

            mounted() {
                
                this.$store.dispatch('getUsers');
            
            }


    }
</script>
