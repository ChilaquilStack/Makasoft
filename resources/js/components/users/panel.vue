<template>

    <div class="row">

        <div class="col-sm-12 col-md-3 col-xl-4 col-lg-4" v-for="(user,index) in users" :key="index">
            
            <div class="card" style="width: 18rem;">
                
                <img :src="`img/${user.picture}`" class="card-img-top" :alt="user.picture" @click="show(user)">
                
                <div class="card-body">
                    
                    <h5 class="card-title text-center">{{user.name}}</h5>
                    
                    <p class="card-text text-center">
                        <small class="text-muted">{{user.email}} / {{user.rol.name}}</small>
                    </p>
               
                </div>
                
                <div class="card-footer btn-group text-center">
                    
                    <a href="#" class="btn btn-danger" @click="remove(user, $event)">
                        <i class="fas fa-trash"></i>
                    </a>
                    
                    <a href="#" class="btn btn-warning" @click="edit(user, $event)">
                        <i class="far fa-edit"></i>
                    </a>
                
                </div>
            
            </div>
        
        </div>

        <userModal :user="showUser"/>
    
    </div>

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

    .card-img-top{
        
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