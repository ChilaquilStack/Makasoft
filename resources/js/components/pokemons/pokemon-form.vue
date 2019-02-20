<template>

    <form>

        <div class="form-group">
            
            <input
                id="name"
                type="text"
                name="name"
                placeholder="Name"
                @keyup.enter="save"
                @keyup="validateInput('Por favor ingrese un nombre valido', $event)"
                v-model="pokemon.name"
                :class="[ {'form-control': true}, {'is-invalid' : (errors['name'] && errors['name'].length)}, {'is-valid': errors['name'] && !errors['name'].length}]"
            />

            <div :class="[{'invalid-feedback': errors['name'] && errors['name'].length}, {'valid-feedback': errors['name'] && !errors['name'].length}]" v-if="errors['name']">
                {{errors['name'][0]}}
            </div>
        
        </div>

        <div class="form-group">
            <input 
                id="level"
                name="level"
                type="number" 
                placeholder="Level"
                @keyup.enter="save"
                v-model="pokemon.level"
                :class="[{'form-control': true}, {'is-invalid': errors['level'] && errors['level'].length}, {'is-valid': errors['level'] && !errors['level'].length}]" 
            >
            <div :class="[{'invalid-feedback': errors['level'] && errors['level'].length}, {'valid-feedback': errors['level'] && !errors['level'].length}]" v-if="errors['level']">
                {{errors['level'][0]}}
            </div>

        </div>
  
        <div class="form-group">
                <select 
                    id="inputState" 
                    @keyup.enter="save"
                    v-model="pokemon.class"
                    :class="[{'custom-select': true}, {'is-invalid': errors['class'] && errors['class'].length}]"
                >   
                    <option disabled value="">Please select one</option>
                    <option value="electric">{{"Electric"}}</option>
                    <option value="psychic">{{"Psychic"}}</option>
                    <option value="ice">{{"Ice"}}</option>
                    <option value="dragon">{{"Dragon"}}</option>
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

    const Swal = require('sweetalert2');

    export default {

        methods: {

            getImage(e) {
                
                this.errors['picture'] = [];
                
                const validate = e.target.files.length ? true : false;

                if(validate)
                    this.pokemon.picture = e.target.files[0];
                else
                    this.errors['picture'].push('Por favor ingrese una imagen');

            },

            clean(obj) {

                for(let i in obj) {
                    obj[i] = '';
                }

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

                const pokemon = new FormData();

                pokemon.append('id', this.pokemon.id);
                pokemon.append('name', this.pokemon.name);
                pokemon.append('class', this.pokemon.class);
                pokemon.append('level', this.pokemon.level);
                pokemon.append('picture', this.pokemon.picture);
                
                this.$store.dispatch('addPokemon', pokemon);

            },

            alert(type) {
                Swal.fire({
                    type: type,
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        },

        computed: {
            
            pokemon() {
                
                return this.$store.getters.pokemon;
            
            },

            errors() {

                return this.$store.getters.errors;
            
            }
        },
    
    }
</script>