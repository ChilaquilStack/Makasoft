<template lang="pug">
  .container.h-100
    .d-flex.justify-content-center.h-100
      .searchbar
        input.search_input(type='text', name='seacrh', placeholder='Search...', @keyup='search')
        a.search_icon(href='#')
          i.fas.fa-search
</template>

<script>

    export default {
        
        methods: {

            search(e){
                
                const {value} = e.target;
                
                const url = 'users/search';

                axios
                .post(url,{value})
                .then(response => {
                    
                    const {data} = response;

                    if(data.length)
                        this.$store.dispatch('setUsers', data);
                    else
                        this.$store.dispatch('getUsers');
                
                })
                .catch(e => console.log(e));
            }

        }

    }
</script>

<style scope="true">
    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    }
</style>