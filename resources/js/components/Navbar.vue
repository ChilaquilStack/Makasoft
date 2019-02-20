<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <a class="navbar-brand" href="#">{{"Pokedex"}}</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <router-link :to="{name: 'pokemons'}" class="nav-link" exact>{{"Pokemons"}}</router-link>
            </li>

            <li class="nav-item">
                <router-link :to="{name: 'trainers'}" class="nav-link">{{"Rols"}}</router-link>
            </li>
        </ul>
    </div>
</nav>
</template>

<script>
export default {
    
}
</script>

<style scoped>

   nav li:hover,

   nav li:active{
      background-color: indianred;
      cursor: pointer;
    }

</style>
