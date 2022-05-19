<template>
    <div class="container-flex">
        <div class="row">
            <StatCard :parametre="parametre" v-for="parametre in parametres" :key="parametre.id"></StatCard>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <inputcustom style="margin-left:15px; margin-right:15px" :champ="intitule"></inputcustom>
                <div class="membre ">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-11">
                            <span class="title col-11">Membre (s)</span>
                        </div>
                        <div class="col-1">
                            <font-awesome-icon icon="fa-solid fa-plus-circle" @click="ajouterEtudiant"/>
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
    </div>
</template>
<script>
import InputCustomVue from './InputCustom.vue'
import MembreVue from './Membre.vue'
import SelectVue from './Select.vue'
import StatCard from './StatCard.vue'
export default {
  components: { 
      StatCard,
      'membre': MembreVue,
      'inputcustom': InputCustomVue,
      'selectcustom': SelectVue
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
          intitule:
          {
                    text:"Theme",
                    type:"text",
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
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    placeholder:"Entrer le matricule",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    placeholder:"+237",
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
                    hide:true,
                    id:1
                },
                {
                    text:"Profession",
                    type:"text",
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
            annee:[
                {
                    value:"2016 - 2019",
                    id:1
                },
                {
                    value:"2017 - 2020",
                    id:2,
                }
                ,
                {
                    value:"2019 - 2021",
                    id:3,
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
          parametres:[
                    {
                        nom:"Memoires",
                        valeur:'134',
                        color:'blue',
                        id:1,
                    },
                    {
                        nom:"PFE",
                        valeur:'189',
                        color:'green',
                        id:2,
                    },
                    {
                        nom:"Admin",
                        color:'pink',
                        valeur:'4'
                    },
                    
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
</style>