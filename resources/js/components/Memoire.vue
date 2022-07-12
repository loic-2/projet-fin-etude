<template>
    <div class="container-flex" style="margin-top:50px;">
        <State :routes="routes" style="margin-bottom:40px"></State>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:10px">
                <div class="col">
                    <ButtonCustom :button="ajouter" @ajoutMemoire="ajoutMemoire"></ButtonCustom>
                    <ButtonCustom :button="supprimer" @supMemoire="supMemoire"></ButtonCustom>
                </div>
                <div class="col-3">
                    <InputCustom @search="resultatRecherche" :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col-3 offset-9 text-end">
                    <select name="" id="" title="Choisir le mode de recherche" class="form-select" v-model="mode">
                        <option value="projet" selected>Projet</option>
                        <option value="membre">Membre</option>
                        <option value="encadreur">Encadreur</option>
                        <option value="categorie">Categorie</option>
                    </select>
                </div>
            </div>
        </div>
        <DataTable @actualise="actualise" :colonnes="colonnes" :edit="true" :trash="true" :donnees="donnees" class="tableau"></DataTable>
    </div>
</template>

<script>
import DataTable from './DataTable.vue';
import ButtonCustom from './ButtonCustom.vue';
import InputCustom from './InputCustom.vue';
import State from './State.vue'
const axios= require('axios');
import { index } from '../api';
import { store } from '../storage';
import { verifyToDelete } from '../StrongMethode';
    export default {
        data() {
            return {
                mode:"",
                routes:[
                    {
                        Name:"Memoires",
                        path:"/memoire",
                        id:1,
                    }
                ],
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
                    valeur:"",
                    placeholder:"Rechercher...",
                    icon:'fa-solid fa-magnifying-glass',
                    showlabel:false,
                    hide:true
                },
                donnees:[],
                colonnes:[
                    {
                        nom:"Theme",
                        reference:"NOM_PROJET",
                        type:"String",
                        key:1,
                        sortable:true
                    },
                    {
                        nom:"Telechargements",
                        reference:"TELECHARGEMENT_PROJET",
                        type:"String",
                        key:2,
                        sortable:true
                    },
                    {
                        nom:"Vues",
                        reference:"VUE_PROJET",
                        type:"String",
                        key:3,
                        sortable:true
                    },
                    {
                        nom:"Promotion",
                        reference:"PROMOTION_PROJET",
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
    State
},
        methods: {
            actualise(){
                const reponse= index(store.getters.getDomain+'api/projet')
                reponse.then(res => {this.donnees=res.data})
            },
            ajoutMemoire() {
            this.$router.push('/ajoutmemoire')
            },
            supMemoire(){
                verifyToDelete(this.$router).then(res => {
                    this.actualise()
               })
            },
            resultatRecherche(){
                if (this.recherche.valeur==="") {
                    this.actualise();
                } else {
                    const reponse= index(store.getters.getDomain+`api/searchprojet/?colonne=${this.mode}&
                    valeur=${this.recherche.valeur}`)
                    reponse.then(res => {this.donnees=res.data})
                }
            }
        },
        mounted(){
            store.state.suppressList=[];
            this.actualise()
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
    margin-bottom: 60px;
}
</style>
