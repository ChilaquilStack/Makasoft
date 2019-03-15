<template lang="pug">
  .navbar.navbar-expand-lg.navbar-light.bg-light
    a.navbar-brand(href="#") Pokedex
      button.navbar-toggler(
          type="button", 
          data-toggle="collapse", 
          data-target="#navbarSupportedContent", 
          aria-controls="navbarSupportedContent", 
          aria-expanded="false", 
          aria-label="Toggle navigation"
        )
        span.navbar-toggler-icon

    #navbarSupportedContent.collapse.navbar-collapse
      ul.navbar-nav.mr-auto
        li.nav-item
          router-link.nav-link(:to="{name: 'pokemons'}" exact) Pokemons
        li.nav-item
          router-link.nav-link(:to="{name: 'trainers'}") Rols

</template>

<script>
  export default {
    
  }
</script>

<style scoped>
  nav li:hover,
  nav li:active{
    background-color : indianred;
    cursor : pointer;
  }
</style>
