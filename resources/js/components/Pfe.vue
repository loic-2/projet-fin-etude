<template>
    <div class="container-flex" style="margin-top:50px;">
        <div class="row" style="margin: 0 0 40px 0;">
            <span class="state"><router-link to="/dashboard">Tableau de bord</router-link> > <router-link to="/pfe">Projet de fin d'etude</router-link></span>
        </div>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:10px">
                <div class="col">
                    <ButtonCustom :button="ajouter" @ajoutMemoire="showAlert"></ButtonCustom>
                    <ButtonCustom :button="supprimer"></ButtonCustom>
                </div>
                <div class="col-3">
                    <InputCustom :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-3 justify-content-end">
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
    export default {
        data() {
            return {
                ajouter:{
                    text:"Ajouter",
                    style:'btn-alert',
                    reference:'ajoutMemoire',
                    textColor:'#363740',
                    icon:'fa-solid fa-plus',
                },
                supprimer:{
                    text:"Supprimer",
                    reference:'supMemoire',
                    style:'btn-alert',
                    textColor:'#363740',
                    icon:'fa-solid fa-times',
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
                        theme:"Realisation d'une bibliotheque numerique",
                        membre:"Annette, Jauress",
                        categorie:"Sante, Education",
                        promotion:"2017 - 2020",
                        edit:true,
                        trash:true,
                        check:false
                    },
                    {
                        theme:"Realisation d'une outil info de consultation du cancer",
                        membre:"Armelle, christian",
                        categorie:"Sante, Informatique",
                        promotion:"2018 - 2021",
                        edit:true,
                        trash:true,
                        check:false
                    },
                    {
                        theme:"Realisation d'une application pour faciliter l'apprentissage",
                        membre:"Emilie, Laure",
                        categorie:"Agriculture, Education",
                        promotion:"2018 - 2021",
                        edit:true,
                        trash:true,
                        check:false
                    }
                ],
                colonnes:[
                    {
                        nom:"Theme",
                        reference:"theme",
                        type:"String",
                        key:1,
                        sortable:true
                    },
                    {
                        nom:"Membres",
                        reference:"membre",
                        type:"String",
                        key:2,
                        sortable:true
                    },
                    {
                        nom:"Categorie",
                        reference:"categorie",
                        type:"String",
                        key:3,
                        sortable:true
                    },
                    {
                        nom:"Promotion",
                        reference:"promotion",
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
    InputCustom
},
        methods: {
            showAlert() {
            // Use sweetalert2
            this.$router.push('/ajoutpfe')
            //this.$swal('Hello Vue world!!!');
            },
        },
        mounted(){
            console.log(1)
            this.$emit("pagename",["Projet de fin d'etude","/pfe"])
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
.state a, .state{
    list-style: none;
    text-decoration: none;
    color: #363740;
}
</style>
