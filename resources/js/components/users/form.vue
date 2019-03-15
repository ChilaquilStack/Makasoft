<template lang="pug">

  form

    .form-group
      input#name(type='text', name='name', placeholder='Name', @keyup.enter='save', @on:keyup="validateInput('Por favor ingrese un nombre valido', $event)", v-model='user.name', :class="[ {'form-control': true}, {'is-invalid' : (errors['name'] && errors['name'].length)}, {'is-valid': errors['name'] && !errors['name'].length}]")
      div(:class="[{'invalid-feedback': errors['name'] && errors['name'].length}, {'valid-feedback': errors['name'] && !errors['name'].length}]", v-if="errors['name']")
        | {{errors['name'][0]}}
    
    .form-group
      input#email(name='email', type='email', placeholder='Email', @keyup.enter='save', v-model='user.email', :class="[{'form-control': true}, {'is-invalid': errors['email'] && errors['email'].length}, {'is-valid': errors['email'] && !errors['email'].length}]")
      div(:class="[{'invalid-feedback': errors['email'] && errors['email'].length}, {'valid-feedback': errors['email'] && !errors['email'].length}]", v-if="errors['email']")
        | {{errors['email'][0]}}
    
    .form-group
      input#password(name='password', type='password', placeholder='Password', @keyup.enter='save', v-model='user.password', :class="[{'form-control': true}, {'is-invalid': errors['password'] && errors['password'].length}, {'is-valid': errors['level'] && !errors['level'].length}]")
      div(:class="[{'invalid-feedback': errors['password'] && errors['password'].length}, {'valid-feedback': errors['password'] && !errors['password'].length}]", v-if="errors['password']")
        | {{errors['password'][0]}}
    
    .form-group
      select#rol(
          v-model='user.rol', 
          @keyup.enter='save', 
          :class="[{'custom-select': true}, {'is-invalid': errors['rol_id'] && errors['rol_id'].length}]"
        )
        option(disabled='', value='') Please select one rol
        option(:value='rol', v-for="rol in rols") {{rol.name}}
      
      div(:class="[{'invalid-feedback': errors['rol_id'] && errors['rol_id'].length}, {'valid-feedback': false}]", v-if="errors['rol_id']")
        | {{errors['rol_id'][0]}}
    
    .form-group
      .custom-file
        input#customFileLang(type='file', @keyup.enter='save', @change='getImage', :class="[{'custom-file-input': true}, {'is-invalid': errors['picture'] && errors['picture'].length}]", lang='en')
        label.custom-file-label(for='customFileLang') Chose a picture
        div(:class="[{'invalid-feedback': errors['picture'] && errors['picture'].length}, {'valid-feedback': false}]", v-if="errors['picture']")
          | {{errors['picture'][0]}}


</template>

<script>

    import axios from 'axios';

    export default {

        methods: {

            async getRols() {

              const {data} = await axios.get('rols');
              
              this.rols = data;
            
            },

            getImage(e) {
                
                this.errors['picture'] = [];
                
                const message = 'Por favor ingrese una imagen';

                e.target.files.length ? this.user.picture = e.target.files[0] : this.errors['picture'].push(message);

            },

            validate(data, validationFn, errorMsg) {
                return validationFn(data) ? data : errorMsg;
            },

            pushError(key, message) {
                this.errors[key].push(message)
            },

            validateInput(errorMessage, event) {

                if(event) event.preventDefault();
            
                const {value, name} = event.target;

                this.errors[name] = []

                const validate = this.validate(value, data => data.match(/[A-Za-z_\s]/), errorMessage);

                if(validate === errorMessage)
                    this.pushError(name, errorMessage);
            },

            save() {
              const user = new FormData();
              user.append('id', this.user.id);
              user.append('name', this.user.name);
              user.append('email', this.user.email);
              user.append('rol_id', this.user.rol.id);
              user.append('password', this.user.password);
              user.append('picture', this.user.picture);
              this.$store.dispatch('addUser', user);
            }
        },

        data(){
          return{
            rols: []
          }
        },

        mounted() {
          this.getRols();
        },

        computed: {
            
            user() {
                
                return this.$store.getters.user;
            
            },

            errors() {

                return this.$store.getters.errors;
            
            }
        },
    
    }
</script>