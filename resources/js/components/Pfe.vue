<template>
    <div class="container-flex" style="margin-top:50px;">
        <state :routes="routes" style="margin-bottom:40px"></state>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:5px">
                <div class="col mt-2">
                    <ButtonCustom :button="ajouter" @ajoutPfe="ajouterDonnee"></ButtonCustom>
                    <ButtonCustom :button="supprimer" @supPfe="supprimerDonnee"></ButtonCustom>
                </div>
                <div class="mt-lg-2 mt-md-2 mt-sm-2 mt-4 col-lg-3 col-md-3 col-sm-5 col-10 offset-lg-4 offset-md-4 offset-sm-2 offset-2">
                    <InputCustom @search="resultatRecherche" :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6 offset-lg-9 offset-md-9 offset-sm-9 offset-6 text-end">
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
import State from './State.vue';
import { index } from '../api';
import { verifyToDelete } from '../StrongMethode';
import { store } from '../storage';
    export default {
        data() {
            return {
                mode:'projet',
                routes:[
                {
                    Name:"Projets de fin d'etudes",
                    path:"/pfe",
                    id:1,
                },
            ],
                ajouter:{
                    text:"Ajouter",
                    style:'btn-alert',
                    reference:'ajoutPfe',
                    textColor:'#363740',
                    icon:'fa-solid fa-plus',
                },
                supprimer:{
                    text:"Supprimer",
                    reference:'supPfe',
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
                    valeur:"",
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
    State,
},
        methods: {
            ajouterDonnee() {
                this.$router.push('/ajoutpfe')
            },
            actualise(){
                const reponse= index(store.getters.getDomain+'api/projet?value=PFE')
                reponse.then(res => {this.donnees=res.data})
            },
            resultatRecherche(){
                if (this.recherche.valeur==="") {
                    this.actualise();
                } else {
                    const reponse= index(store.getters.getDomain+`api/searchprojet/?colonne=${this.mode}&
                    valeur=${this.recherche.valeur}`)
                    reponse.then(res => {this.donnees=res.data})
                }
            },
            supprimerDonnee(){
               verifyToDelete(this.$router).then(res => {
                    this.actualise()
               })
            }
        },
        mounted(){
            store.state.suppressList=[];
            this.actualise()
            this.$emit("pagename","Projets de fin d'etude")
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
