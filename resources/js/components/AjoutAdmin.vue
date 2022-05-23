<template>
    <div class="container-flex" style="margin-top:45px;padding:0">
        <div class="row">
            <State :routes="routes"></State>
        </div>
        <div class="row form">
            <InputCustom :champ="champ" v-for="champ in champs" :key="champ.id"></InputCustom>
        </div>
        <ButtonGroup :buttons="buttons"></ButtonGroup>
    </div>
</template>

<script>
import State from "./State.vue";
import InputCustom from "./InputCustom.vue";
import ButtonGroup from "./ButtonGroup.vue";
export default {
    components: {
    State,
    InputCustom,
    ButtonGroup
},
    data(){
        return{
            buttons:[
                {
                    text:"Annuler",
                    reference:"annulerMemoire",
                    icon:"fa-solid fa-undo",
                    id:1
                },
                {
                    text:"Enregistrer",
                    reference:"enregistrerMemoire",
                    icon:"fa-solid fa-save",
                    id:2
                }
            ],
            champs:[
                {
                    text:"Nom complet",
                    type:"text",
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
                {
                    text:"Login",
                    type:"text",
                    placeholder:"Entrer un login",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Mot de passe",
                    type:"password",
                    placeholder:"Entrer un mot de passe",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:3,
                },
                {
                    text:"Confirmer mot de passe",
                    type:"password",
                    placeholder:"Veillez confirmer le mot de passe",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:4,
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