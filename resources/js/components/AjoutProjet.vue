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
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="ajouterEtudiant" v-if="addetudiant"/>
                        </div>
                    </div>
                    <membre :champs="champs" :parametres="parametres1" titre="Filiere" v-for="nombre in nombrefois" :key="nombre.nombre"></membre>
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
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="ajouterEncadreur"/>
                        </div>
                    </div>
                    <membre :champs="champs2" :parametres="parametres2" titre="Type" v-for="nombre in nombrefoisEncadreur" :key="nombre.nombre"></membre>
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
    },
    components:{
      'membre': MembreVue,
      'inputcustom': InputCustomVue,
      'selectcustom': SelectVue,
      'categorie': CategorieVue
    },
   methods:{
       ajouterEtudiant(){
           this.nombrefois.push({nombre:this.nombrefois.length+1})
       },
       ajouterEncadreur(){
           this.nombrefoisEncadreur.push({nombre:this.nombrefoisEncadreur.length+1})
       }
   },
    data(){
        return{

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
                    showlabel:true,
                    placeholder:"Entrer le theme",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
          champs:[
                {
                    text:"Nom",
                    type:"text",
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                },
            ],
            champs2:[
                {
                    text:"Nom",
                    type:"text",
                    placeholder:"Entrer le nom complet",
                    icon:'fa-solid fa-eye-slash',
                    showlabel:true,
                    hide:true,
                    id:1
                },
                {
                    text:"Profession",
                    type:"text",
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
          nombrefois:[
              {
                  nombre:1
              }
          ],
          nombrefoisEncadreur:[
              {
                  nombre:1
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