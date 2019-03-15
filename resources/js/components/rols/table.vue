<template lang="pug">
    table.table.table-bordered.table-sm.table-hover
        thead.thead-dark
          tr
            th #
            th Name
            th Options
        tbody
          tr(v-for=('(rol,index) in rols') :key="index")
            td {{rol.id}}
            td {{rol.name}}
            td
              .btn-group
                button.btn.btn-danger(type="button")
                  i.fas.fa-trash-alt
                button.btn.btn-warning(type="button")
                  i.fas.fa-edit
</template>

<script>

  import axios from 'axios';

  export default {
    
    props:{

      rols:{
        
        type: Array,
        
        required: true
      
      }

    },

    methods:{
      
      save() {
        

      }
    
    }

  }

</script>

<style lang="css">

  table {
    
    text-align: center;
  
  }

</style>
