<template>
    <div class="container-flex">
        <div class="row">
            <StatCard :parametre="parametre" v-for="parametre in parametres" :key="parametre.id"></StatCard>
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
export default {
  components: {
    StatCard,
    "personne-connecte": PersonneConnecteVue,
    LaUne,
    Chart
},
  data(){
      return{
          parametres:[
                    {
                        nom:"Memoires",
                        valeur:'134',
                        color:'#5EA6DA',
                        id:1,
                    },
                    {
                        nom:"PFE",
                        valeur:'189',
                        color:'#5E63DA',
                        id:2,
                    },
                    {
                        nom:"Admin",
                        color:'#32E279',
                        valeur:'4'
                    },
                    
                ],

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
                        nom:"Brian",
                        color:"#17CAF1",
                        id:1,
                    },
                    {
                        nom:"Athena",
                        color:"#BDB6B6",
                        id:2,
                    },
                    {
                        nom:"Leslie",
                        color:"#1B32FB",
                        id:3,
                    },
                    {
                        nom:"Naeke",
                        color:"#000000",
                        id:4,
                    },
                ],
      }
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