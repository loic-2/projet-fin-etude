<template>
    <div class="container-flex">
        <div class="row">
            <StatCard color="#5EA6DA" nom="Memoires" :valeur="memoires_val"></StatCard>
            <StatCard color="#5E63DA" nom="PFE" :valeur="pfe_val"></StatCard>
            <StatCard color="#32E279" nom="Administrateur" :valeur="admin_val"></StatCard>
        </div>
        <div class="row chart">
            <Chart></Chart>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="row  documents">
                    <div style="margin:5px 0 10px 5px">
                        <span>
                            <h5>Documents les plus en vue</h5>
                        </span>
                    </div>
                    <LaUne :document="document" v-for="document in documents" :key="document.id"/>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 ">
                <div class="row personne-connecte">
                    <div style="margin:5px 0 10px 5px">
                        <span>
                            <h5>Personnes connectes</h5>
                        </span>
                    </div>
                    <personne-connecte :personneConnecte="personne" v-for="personne in personnes" :key="personne.id"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import PersonneConnecteVue from './PersonneConnecte.vue';
import LaUne from './LaUne.vue';
import StatCard from './StatCard.vue'
import Chart from './Chart.vue';
import { store } from '../storage';
import { index, manyResponse } from '../api';
const axios= require('axios')
export default {
  components: {
    StatCard,
    "personne-connecte": PersonneConnecteVue,
    LaUne,
    Chart
},
  data(){
      return{
                memoires_val:0,
                pfe_val:0,
                admin_val:0,

                documents:[
                    {
                        titre:"Conception et realisation d'un robot pour les recoltes",
                        text: 45,
                        background:"#FAA92F",
                        id:1,
                    },
                    {
                        titre:"Conception et realisation d'un robot pour les recoltes",
                        text: 30,
                        background:"#FA532F",
                        id:2,
                    },
                    {
                        titre:"Conception et realisation d'un robot pour les recoltes",
                        text: 10,
                        background:"#72C2FC",
                        id:3,
                    },
                ],
                personnes:[
                    {
                        name:"Brian",
                        id:1,
                    },
                    {
                        name:"Athena",
                        id:2,
                    },
                    {
                        name:"Leslie",
                        id:3,
                    },
                    {
                        name:"Naeke",
                        id:4,
                    },
                ],
      }
  },
  mounted(){
    Promise.all([index(store.getters.getDomain+'api/users'),index(store.getters.getDomain+'api/projet?value=PFE'),
    index(store.getters.getDomain+'api/projetplusvue/?nombre=3'),index(store.getters.getDomain+'api/projet?value=Memoire')
    ,index(store.getters.getDomain+'api/users?connecte=1')])
    .then((res)=>{
        this.admin_val=res[0].data.length
        this.memoires_val=res[3].data.length
        this.pfe_val=res[1].data.length
        this.personnes=res[4].data
        for (let index = 0; index < res[2].data.length; index++) {
            this.documents[index].titre=res[2].data[index].NOM_PROJET;
            this.documents[index].text=res[2].data[index].VUE_PROJET;
        }
    })
  }
    
}
</script>
<style scoped>

.card{
    margin-top: 60px;
}

.personne-connecte{
    background-color: #ffffff;
    border-radius: 20px;
}

.documents{
    background-color: #ffffff;
    border-radius: 20px;
}

.row{
    margin: 0;
}

.col-lg-8,.col-lg-4{
    padding: 15px;
    margin: 0;
}
.chart{
    background-color: #ffffff;
    margin: 0 15px 0 15px;
    border-radius: 20px;
}
</style>