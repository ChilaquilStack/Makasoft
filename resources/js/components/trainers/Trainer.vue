<template>

    <section>

    <h1>
        {{'Trainers'}}
    </h1>

    <form>

        <div class="form-group">
            
            <input
                id="name"
                type="text" 
                placeholder="Name"
                @keyup.enter="save"
                @keyup="validateName"
                v-model="trainer.name"
                :class="[ {'form-control': true}, {'is-invalid' : (errors['name'] && errors['name'].length)}, {'is-valid': errors['name'] && !errors['name'].length}]" 
            >

            <div :class="[{'invalid-feedback': errors['name'] && errors['name'].length}, {'valid-feedback': errors['name'] && !errors['name'].length}]" v-if="errors['name']">
                {{errors['name'][0]}}
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
                >
                
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                
                <div :class="[{'invalid-feedback': errors['picture'] && errors['picture'].length}, {'valid-feedback': false}]" v-if="errors['picture']">
                    {{errors['picture'][0]}}
                </div>
            
            </div>
        
        </div>
    
    </form>

    </section>
</template>

<script>
export default {
    data(){
        return {
            trainer:{},
            errors:{}
        }
    },
    methods: {
        save(){

        },

        getImage(){

        },

        validateName(){
            
        }
    },
}
</script>