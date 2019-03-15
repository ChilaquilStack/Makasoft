<template lang="pug">
  #main.d-flex.justify-content-center.align-items-center
    h1.mr-3.pr-3.align-top.border-right.inline-block.align-content-center 404
    .inline-block.align-middle
      #desc.font-weight-normal.lead The page you requested was not found
</template>

<script>
export default {
    name: 'error'
}
</script>

<style scoped>
    #main {
        height: 100vh;
    }
</style>