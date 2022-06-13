<template>
    <div class="container-flex" style="margin-top:45px;padding:0">
        <div class="row">
            <State :routes="routes"></State>
        </div>
        <div class="row form">
            <InputCustom :champ="champ" v-for="champ in champs" :key="champ.id"></InputCustom>
        </div>
        <div class="row">
            <div class="col text-center" style="margin: 20px 0 20px 0">
                <ButtonCustom :button="buttons[0]"></ButtonCustom>
                <ButtonCustom @enregistrerAdmin="save" :button="buttons[1]"></ButtonCustom>
            </div>
        </div>
    </div>
</template>

<script>
import State from "./State.vue";
import { change } from "../storage";
import InputCustom from "./InputCustom.vue";
import ButtonGroup from "./ButtonGroup.vue";
import ButtonCustom from "./ButtonCustom.vue";
import { registerAdmin } from '../StrongMethode';
export default {
    components: {
    State,
    InputCustom,
    ButtonGroup,
    ButtonCustom
    },
    methods:{
        save(){
            if (this.champs[3].valeur==this.champs[4].valeur) {
                this.donnee.NOM_ADMINISTRATEUR= this.champs[0].valeur;
                this.donnee.name= this.champs[1].valeur;
                this.donnee.email=this.champs[2].valeur;
                this.donnee.password= this.champs[3].valeur;
                this.donnee.password_confirmation= this.champs[4].valeur;
                console.log(this.donnee)
                registerAdmin(this.donnee)
            } else {
                this.$swal.fire({
                    title:'erreur',
                    text:'Les mots de passe ne sont pas identique',
                    icon:'error',
                })
            }
        }
    },
    data(){
        return{
            val:"sss",
            donnee:{
                email:'',
                password:'',
                password_confirmation:'',
                name:'',
                NOM_ADMINISTRATEUR:''
            },
            buttons:[
                {
                    text:"Annuler",
                    reference:"annulerAdmin",
                    icon:"fa-solid fa-undo",
                    id:1
                },
                {
                    text:"Enregistrer",
                    reference:"enregistrerAdmin",
                    icon:"fa-solid fa-save",
                    id:2
                }
            ],
            champs:[
                {
                    text:"Nom complet",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    content:'dfghj',
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
                {
                    text:"Login",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer un login",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Email",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer une adresse mail",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                },
                {
                    text:"Mot de passe",
                    type:"password",
                    valeur:'',
                    placeholder:"Entrer un mot de passe",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:4,
                },
                {
                    text:"Confirmer mot de passe",
                    type:"password",
                    valeur:'',
                    placeholder:"Veillez confirmer le mot de passe",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:5,
                },
            ],
            routes:[
                {
                    Name:"Administrateur",
                    path:"/admin",
                    id:1,
                },
                {
                    Name:"Ajout d'administrer",
                    path:"/ajoutadmin",
                    id:2,
                }
            ],
        }
    }
}
</script>

<style scoped>
.row {
    margin: 0;
}
.form{
    margin: 20px 15px 20px 15px;
    background-color: #ffffff;
    border-radius: 20px;
}
</style>