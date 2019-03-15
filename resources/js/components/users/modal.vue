<template lang="pug">

  #modal.modal.fade(tabindex='-1', role='dialog', aria-labelledby='exampleModalLabel', aria-hidden='true')
    
    .modal-dialog(role='document')
      
      .modal-content
        
        .modal-header
          h5.modal-title {{user.name}}
          button.close(type='button', data-dismiss='modal', aria-label='Close')
            span(aria-hidden='true') ×
        
        .modal-body.text-center
          img.image(:src="[user.picture ? `img/${user.picture}` : 'img/default.png']", :alt='user.picture')
        
        .modal-footer
          button.btn.btn-danger(type='button', data-dismiss='modal') Close

</template>

<script>
    export default {
    
        props:{
            user:{
                type: Object,
                required: true
            }
        }

    }
</script>

<style lang="css" scoped>
  
  .image{
    width: 50%;
    height: auto;
  }
    
</style>