<template lang="pug">

  section

    <rol-header/>

    <rol-table :rols="rols"/>

</template>

<script>

  import rolForm from '../rols/form';
  import rolTable from '../rols/table';
  import rolHeader from '../rols/Header';

  export default {

    data(){
      return{
        rols:[
          {id: 1, name: 'Admin'},
          {id: 2, name: 'User'},
          {id: 3, name: 'Seller'},
        ]
      }
    },

    components:{
      'rol-form': rolForm,
      'rol-table': rolTable,
      'rol-header': rolHeader
    }
  }

</script>
