<template>

    <form>

        <div class="form-group">
            
            <input
                id="name"
                type="text"
                name="name"
                placeholder="Name"
                @keyup.enter="save"
                @on:keyup="validateInput('Por favor ingrese un nombre valido', $event)"
                v-model="user.name"
                :class="[ {'form-control': true}, {'is-invalid' : (errors['name'] && errors['name'].length)}, {'is-valid': errors['name'] && !errors['name'].length}]"
            />

            <div :class="[{'invalid-feedback': errors['name'] && errors['name'].length}, {'valid-feedback': errors['name'] && !errors['name'].length}]" v-if="errors['name']">
                {{errors['name'][0]}}
            </div>
        
        </div>

        <div class="form-group">
            <input 
                id="email"
                name="email"
                type="email" 
                placeholder="email"
                @keyup.enter="save"
                v-model="user.email"
                :class="[{'form-control': true}, {'is-invalid': errors['level'] && errors['level'].length}, {'is-valid': errors['level'] && !errors['level'].length}]" 
            >
            <div :class="[{'invalid-feedback': errors['level'] && errors['level'].length}, {'valid-feedback': errors['level'] && !errors['level'].length}]" v-if="errors['level']">
                {{errors['level'][0]}}
            </div>

        </div>

        <div class="form-group">
            <input 
                id="password"
                name="password"
                type="password"
                placeholder="password"
                @keyup.enter="save"
                v-model="user.password"
                :class="[{'form-control': true}, {'is-invalid': errors['level'] && errors['level'].length}, {'is-valid': errors['level'] && !errors['level'].length}]" 
            >
            <div :class="[{'invalid-feedback': errors['level'] && errors['level'].length}, {'valid-feedback': errors['level'] && !errors['level'].length}]" v-if="errors['level']">
                {{errors['level'][0]}}
            </div>

        </div>
  
        <div class="form-group">
            <select
                id="rol" 
                @keyup.enter="save"
                v-model="user.rol"
                :class="[{'custom-select': true}, {'is-invalid': errors['class'] && errors['class'].length}]"
            >   
                <option disabled value="">Please select one</option>
                <option value="1">{{"User"}}</option>
                <option value="2">{{"Admin"}}</option>
                <option value="3">{{"Seller"}}</option>
            
            </select>
            
            <div :class="[{'invalid-feedback': errors['class'] && errors['class'].length}, {'valid-feedback': false}]" v-if="errors['class']">
                {{errors['class'][0]}}
            </div>
        
        </div>

        <div class="form-group">
            <div class="custom-file">
                <input 
                    lang="es" 
                    type="file"
                    @keyup.enter="save"
                    id="customFileLang"
                    @change="getImage"
                    :class="[{'custom-file-input': true}, {'is-invalid': errors['picture'] && errors['picture'].length}]"
                />
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                <div :class="[{'invalid-feedback': errors['picture'] && errors['picture'].length}, {'valid-feedback': false}]" v-if="errors['picture']">
                    {{errors['picture'][0]}}
                </div>
            </div>
        </div>
    
    </form>

</template>

<script>

    export default {

        methods: {

            getImage(e) {
                
                this.errors['picture'] = [];
                
                const validate = e.target.files.length ? true : false;

                if(validate)
                    this.user.picture = e.target.files[0];
                else
                    this.errors['picture'].push('Por favor ingrese una imagen');

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
                user.append('rol_id', this.user.rol);
                user.append('password', this.user.password);
                user.append('picture', this.user.picture);
                
                this.$store.dispatch('addUser', user);

            }
            
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