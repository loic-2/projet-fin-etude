<template>
    <div class="container-flex" style="margin-top:50px;">
        <State :routes="routes" style="margin-bottom:40px"></State>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:10px">
                <div class="col">
                    <ButtonCustom :button="ajouter" @ajoutAdmin="showAlert"></ButtonCustom>
                    <ButtonCustom :button="supprimer"></ButtonCustom>
                </div>
                <div class="col-3">
                    <InputCustom :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <ButtonCustom :button="filtre"></ButtonCustom>
                </div>
            </div>
        </div>
        <DataTable :colonnes="colonnes" :donnees="donnees" class="tableau"></DataTable>
    </div>
</template>

<script>
import DataTable from './DataTable.vue';
import ButtonCustom from './ButtonCustom.vue';
import InputCustom from './InputCustom.vue';
import State from './State.vue'
    export default {
        data() {
            return {
                routes:[
                    {
                        Name:"Administrateur",
                        path:"/admin",
                        id:1
                    }
                ],
                ajouter:{
                    text:"Ajouter",
                    style:'btn-alert',
                    reference:'ajoutAdmin',
                    textColor:'#363740',
                    icon:'fa-solid fa-user-plus',
                },
                supprimer:{
                    text:"Supprimer",
                    reference:'supAdmin',
                    style:'btn-alert',
                    textColor:'#363740',
                    icon:'fa-solid fa-user-times',
                },
                filtre:{
                    text:"Filtrer",
                    style:'btn-alert',
                    textColor:'#363740',
                    icon:'fa-solid fa-filter',
                },
                recherche:{
                    text:"",
                    type:"text",
                    placeholder:"Rechercher...",
                    icon:'fa-solid fa-magnifying-glass',
                    showlabel:false,
                    hide:true
                },
                donnees:[
                    {
                        nom:"Ganno Loic",
                        login:"loic",
                        mdp:"weddkijhggs",
                        date:"2021-03-23",
                        edit:true,
                        trash:true,
                        check:false
                    },
                    {
                        nom:"Athena Irma",
                        login:"Irma",
                        mdp:"dfgrttr55454",
                        date:"2019-07-02",
                        edit:true,
                        trash:true,
                        check:false
                    },
                    {
                        nom:"Tekonang Brian",
                        login:"Brian",
                        mdp:"1334ghhhhf",
                        date:"2022-04-23",
                        edit:true,
                        trash:true,
                        check:false
                    }
                ],
                colonnes:[
                    {
                        nom:"Nom",
                        reference:"nom",
                        type:"String",
                        key:1,
                        sortable:true
                    },
                    {
                        nom:"Login",
                        reference:"login",
                        type:"String",
                        key:2,
                        sortable:true
                    },
                    {
                        nom:"Mot de passe",
                        reference:"mdp",
                        type:"String",
                        key:3,
                        sortable:false
                    },
                    {
                        nom:"Date Ajout",
                        reference:"date",
                        type:"String",
                        key:4,
                        sortable:true
                    },
                ],
            }
    },
        components:{
            DataTable,
            ButtonCustom,
            InputCustom,
            State,
        },
        methods: {
            showAlert() {
            // Use sweetalert2
            this.$router.push('/ajoutadmin')
            //this.$swal('Hello Vue world!!!');
            },
        },
        mounted(){
            this.$emit("pagename","Administrateur")
        }
    }
</script>
<style scoped>

.row{
    margin: 0;
}

.tableau{
    margin:0 15px 15px 15px;
}
.col-3, .col{
    padding: 0;
}
.group-box{
    margin-bottom: 40px;
}
</style>
