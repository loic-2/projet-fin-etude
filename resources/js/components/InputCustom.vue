<template>
    <div class="input">
        <div v-if="champ.showlabel">
            <label :for="champ.text" class="title">{{champ.text}}</label><br>
        </div>
        <div class="input-group mb-3">
            <input required :type="champ.type" style="border-radius:10px"  class="valeur form-control" 
            :class="[test? 'is-valid': 'is-invalid']" v-model="champ.valeur" 
            :placeholder="champ.placeholder" @input="controle">
            <div class="invalid-feedback">
                {{error_message}}
            </div>
        </div>
    </div>
</template>

<script>import { store } from "../storage"

export default {
    data(){
        return{
            error_message:'',
            test: true,
            color: "#363740"
        }
    },
    props:{
        champ:{
            type:Object,
            default:()=>({
                text:"Bouton",
                type:"password",
                valeur:'aaa',
                placeholder:"Entrer ...",
                icon:'fa-solid fa-eye-slash',
                showlabel:true,
                controle: {
                    type: Function
                }

            })
        },
    },
    methods:{
        controle(e){
            switch (this.champ.text) {
                case 'Nom':
                    if (this.champ.valeur.length<=12) {
                        this.test=false
                        this.error_message='12 caracteres au moins'
                    }else{
                        this.test=true
                    }
                    break;
                case 'Theme':
                    if (this.champ.valeur.length<=12 || this.champ.valeur.length>=100) {
                        this.test=false
                        this.$emit('good',this.test)
                        this.error_message='Le theme doit contenir au moins 12 caracteres et au plus 100'
                    }else{
                        this.test=true
                        this.$emit('good',this.test)
                    }
                    break;
                case 'Matricule':
                    if (this.champ.valeur.length<=6 || this.champ.valeur.length>=12) {
                        this.test=false
                        this.error_message='Matricule invalide(au moins 6 caracteres,au plus 12)'
                    }else{
                        this.test=true
                    }
                    break;
                case 'Telephone':
                    if (!(this.champ.valeur.length==9 && typeof(parseInt(this.champ.valeur))=="number")) {
                        this.test=false
                        this.error_message='Le numero n\'est pas valide'
                    }else{
                        this.test=true
                    }
                    break;
                case 'Profession':
                    if (this.champ.valeur.length>=20) {
                        this.test=false
                        this.error_message='Nom de metier trop long'
                    }else{
                        this.test=true
                    }
                    break;
                case 'Fichier':
                    let extension= e.target.files[0].name.split('.')
                    let i=extension.length-1
                    if (extension[i] == 'pdf') {
                        this.test=true
                        store.state.file=e.target.files[0]
                    } else {
                        this.test=false
                        this.error_message='Seul les fichiers d\'extension .pdf sont autorises'
                    }
                    break;
                default:
                    break;
            }
        },
    },
}
</script>

<style scoped>
input{
    padding-left: 10px;
    padding-right: 30px;
    background-color: #ffffff;
    height: 40px;
    width: 100%;
    border: 1px #363740 solid;

}
.title{
    margin-top: 10px;
    margin-bottom: 3px;
    color:#363740;
}


</style>