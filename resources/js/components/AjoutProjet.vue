<template>
    <div class="container-flex">
        <div class="row">
            <div class="col col-xs-12">
                <inputcustom style="margin-left:15px; margin-right:15px" :champ="intitule"></inputcustom>
                <div class="membre ">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-11">
                            <span class="title col-11">Membre (s)</span>
                        </div>
                        <div class="col-1">
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="numberEtudiant++" v-if="addetudiant"/>
                        </div>
                    </div>
                    <membre :champs="etudiant[0]" :parametres="parametres1" titre="Filiere"/>
                    <membre :champs="etudiant[1]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>2"/>
                    <membre :champs="etudiant[2]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>3"/>
                    <membre :champs="etudiant[3]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>4"/>
                    <membre :champs="etudiant[4]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>5"/>
                    <membre :champs="etudiant[5]" :parametres="parametres1" titre="Filiere" v-if="numberEtudiant>6"/>
                </div>
            </div>
            <div class="col col-xs-12">
                <selectcustom :parametres="annee" title="Promotion" style="margin-left:15px; margin-right:15px"></selectcustom>
                <div class="encadreur">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-11">
                            <span class="title col-11">Encadreur (s)</span>
                        </div>
                        <div class="col-1">
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="numberEncadreur++"/>
                        </div>
                    </div>
                    <membre :champs="champs2" :parametres="parametres2" titre="Type"></membre>
                    <membre :champs="champs2" :parametres="parametres2" titre="Type" v-if="numberEncadreur>1"/>
                </div>
            </div>
        </div>
        <div class="row" style="margin:0 20px 20px 20px;">
            <div class="categorie" >
                <div class="row">
                    <span>Categorie</span>
                </div>
                <div class="row">
                    <div class="col" v-for="categorie in categories" :key="categorie.id">
                        <categorie :categorie="categorie"></categorie>
                    </div>
                </div>
                <div class="row">
                    <div class="col" v-for="categorie in categories" :key="categorie.id">
                        <categorie :categorie="categorie"></categorie>
                    </div>
                </div>
                <div class="row">
                    <div class="col" v-for="categorie in categories" :key="categorie.id">
                        <categorie :categorie="categorie"></categorie>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CategorieVue from './Categorie.vue'
import InputCustomVue from './InputCustom.vue'
import MembreVue from './Membre.vue'
import SelectVue from './Select.vue'
export default {
    props:{
        addetudiant:Boolean,
        annee: Array,
        etudiant:Array,
    },
    components:{
      'membre': MembreVue,
      'inputcustom': InputCustomVue,
      'selectcustom': SelectVue,
      'categorie': CategorieVue
    },
    data(){
        return{
            numberEncadreur:1,
            numberEtudiant:1,
          categories:[
              {
                  text:'Sante',
                  background:'#F58F8F',
                  id:1
              },
              {
                  text:'Agriculture',
                  background:'#F5D699',
                  id:2
              },
              {
                  text:'Telecommunications & TIC',
                  background:'#AAF58F',
                  id:3
              },
          ],
          intitule:
          {
                    text:"Theme",
                    type:"text",
                    valeur:'',
                    showlabel:true,
                    placeholder:"Entrer le theme",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },          
            champs2:[
                {
                    text:"Nom",
                    type:"text",
                    placeholder:"Entrer le nom complet",
                    icon:'fa-solid fa-eye-slash',
                    valeur:'',
                    showlabel:true,
                    hide:true,
                    id:1
                },
                {
                    text:"Profession",
                    type:"text",
                    valeur:'',
                    showlabel:true,
                    placeholder:"Entrer la profession",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                }
            ],
          parametres1:[
                {
                    value:"ITT2-IR-CLA",
                    id:1
                },
                {
                    value:"ITT3-IR-CLA",
                    id:2,
                },
                {
                    value:"ITT1-IR-CLA",
                    id:3,
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
    }
}
</script>
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