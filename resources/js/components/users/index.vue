<template>

    <div>
        
        <h1>
            {{'Users'}}
        </h1>

        <usersForm/>

        <usersSearch/>
        
        <usersPanel/>
        
        <usersPaginator :offset="3"/>

    </div>

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
