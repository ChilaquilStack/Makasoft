<template lang="pug">
    .form
      .form-group
        input#name(
          type='text', 
          name='name', 
          placeholder='Rol Name', 
          @keyup.enter='save', 
          @on:keyup="validateInput('Por favor ingrese un nombre valido', $event)", 
          v-model='rol.name', 
          :class="[ {'form-control': true}, {'is-invalid' : (errors['name'] && errors['name'].length)}, {'is-valid': errors['name'] && !errors['name'].length}]")
        
        div(:class="[{'invalid-feedback': errors['name'] && errors['name'].length}, {'valid-feedback': errors['name'] && !errors['name'].length}]", v-if="errors['name']")
          | {{errors['name'][0]}}
</template>

<script>
  export default {
    data(){
      return{
        rol: {},
        errors:[]
      }
    }
  }
</script>