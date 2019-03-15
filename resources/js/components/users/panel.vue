<template lang="pug">

  .row
    .col-sm-12.col-md-3.col-xl-4.col-lg-4(v-for='(user,index) in users', :key='index')
      .card(style='width: 18rem;')
        img.card-img-top(:src="[ user.picture ? `img/${user.picture}` : 'img/default.png']", :alt='user.picture', @click='show(user)')
        .card-body
          h5.card-title.text-center {{user.name}}
          p.card-text.text-center
            span.badge.badge-light {{user.email}}
          p.card-text.text-center
            span.badge.badge-light {{user.rol.name}}
        .card-footer.btn-group.text-center
          a.btn.btn-danger(href='#', @click='remove(user, $event)')
            i.fas.fa-trash
          a.btn.btn-warning(href='#', @click='edit(user, $event)')
            i.far.fa-edit
    userModal(:user='showUser')

</template>

<script>

    import modal from './modal';

    export default {

        data() {
            return{
                showUser:{}
            }
        },

        components:{

            userModal: modal

        },

        methods:{

            remove(user, event) {

                event.preventDefault();

                this.$store.dispatch('removeUser', {...user});

            },

            show(user){

                this.showUser = {...user};

                $('#modal').modal();

            },

            edit(user, event) {

                event.preventDefault();

                this.$store.dispatch('editUser', {...user});
            
            }

        },

        computed: {

            users() {
                return this.$store.getters.users;
            },

            pokemon(){
                return this.$store.getters.pokemon;
            }
        },

    }
</script>

<style scope="true">

  .card-img-top {
    cursor: pointer;
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    filter: grayscale(100%);
  }
    
  .card-img-top:hover{
    -webkit-filter: grayscale(0);
    -moz-filter: grayscale(0);
    -ms-filter: grayscale(0);
    -o-filter: grayscale(0);
    filter: grayscale(0);
  }

</style>