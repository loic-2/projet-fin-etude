<template>
    <div class="container-flex">
        <div class="row">
            <div class="col col-xs-12">
                <inputcustom style="margin-left:15px; margin-right:15px" :champ="intitule"></inputcustom>
                <inputcustom style="margin-left:15px; margin-right:15px" :champ="file"></inputcustom>
                <div class="membre ">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-11">
                            <span class="title col-11">Membre (s)</span>
                        </div>
                        <div class="col-1">
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="numberEtudiant++" v-if="addetudiant"/>
                        </div>
                    </div>
                    <membre :valeur_select="valeurs_select[0]" :champs="etudiant[0]" :parametres="parametres1" titre="Filiere"/>
                    <membre :valeur_select="valeurs_select[1]" :champs="etudiant[1]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>2"/>
                    <membre :valeur_select="valeurs_select[2]" :champs="etudiant[2]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>3"/>
                    <membre :valeur_select="valeurs_select[3]" :champs="etudiant[3]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>4"/>
                    <membre :valeur_select="valeurs_select[4]" :champs="etudiant[4]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>5"/>
                    <membre :valeur_select="valeurs_select[5]" :champs="etudiant[5]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>6"/>
                </div>
            </div>
            <div class="col col-xs-12">
                <selectcustom :filiere="valeurs_select[8]" :parametres="annee" title="Promotion" style="margin-left:15px; margin-right:15px"></selectcustom>
                <div class="encadreur">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-11">
                            <span class="title col-11">Encadreur (s)</span>
                        </div>
                        <div class="col-1">
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="numberEncadreur++"/>
                        </div>
                    </div>
                    <membre :valeur_select="valeurs_select[6]" :champs="encadreur[0]" :parametres="parametres2" titre="Type"></membre>
                    <membre  :valeur_select="valeurs_select[7]" :champs="encadreur[1]" :parametres="parametres2" titre="Type" v-if="numberEncadreur>1"/>
                </div>
            </div>
        </div>
        <div class="row" style="margin:0 35px 20px 18px;">
            <label for="categorie">Categorie (s)</label>
            <vue-multi-select label="name" track-by="name" v-model="store.state.categorieSelected" :multiple="true" :searchable="true" :close-on-select="true" 
            placeholder="Selectionner la/les categorie(s) du projet" :options="test"></vue-multi-select>
        </div>
    </div>
</template>

<script>
import CategorieVue from './Categorie.vue'
import InputCustomVue from './InputCustom.vue'
import VueMultiSelect from 'vue-multiselect'
import MembreVue from './Membre.vue'
import SelectVue from './Select.vue'
import {storeCategorieSelected,store, getCategorieData} from '../storage'
export default {
    props:{
        valeurs_select:[],
        parametres1:Array,
        file:Object,
        intitule:Object,
        addetudiant:Boolean,
        annee: Array,
        etudiant:Array,
        encadreur:Array,
    },
    components:{
      'membre': MembreVue,
      'vue-multi-select':VueMultiSelect,
      'inputcustom': InputCustomVue,
      'selectcustom': SelectVue,
      'categorie': CategorieVue
    },
    data(){
        return{
            store,
            value:[],
            numberEncadreur:1,
            numberEtudiant:1,
            test:store.getters.getCategorie,
          categories:[
              {
                  text:'Sante',
                  label:'Sante',
                  background:'#F58F8F',
                  id:1
              },
              {
                  text:'Agriculture',
                  label:'Agriculture',
                  background:'#F5D699',
                  id:2
              },
              {
                  text:'Telecommunications & TIC',
                  label:'Telecommunications & TIC',
                  background:'#AAF58F',
                  id:3
              },
          ],
            parametres2:[
                {
                    value:"Academique",
                    id:1
                },
                {
                    value:"Professionnel",
                    id:2,
                }
            ], 
        }
    },
    mounted() {
        store.state.categorie=[]
        getCategorieData()
    },
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
.row{
    margin: 0;
}
.membre{
    margin-top:20px;
    padding: 0;
    margin-bottom: 20px;
    margin-left: 15px;
    margin-right: 15px;
    background-color: #ffffff;
    border-radius: 20px;
    padding-top: 1px;
    padding-bottom: 1px;
}

.encadreur{
    margin-top:20px;
    padding: 0;
    margin-bottom: 20px;
    margin-left: 15px;
    margin-right: 15px;
    background-color: #ffffff;
    border-radius: 20px;
    padding-top: 1px;
    padding-bottom: 1px;
}

.categorie{
    background-color: #ffffff;
    border-radius: 20px;
    padding: 10px 0 10px 0;
}
</style>