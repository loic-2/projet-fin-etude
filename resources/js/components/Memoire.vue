<template>
    <div class="container-flex">
        <div class="row justify-content-center">
                <div class="card px-0">
                    <div class="card-header">Example Component {{message}}</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <Button class="show" @click="showAlert">Click</Button>
                </div>
        </div>
        <div class="row">
            <div class="col documents">
                <div style="margin:0 0 10px 0">
                    <span>
                        Documents les plus en vue
                    </span>
                </div>
                <LaUne :document="document" v-for="document in documents" :key="document.id"/>
            </div>
            <div class="col-4 personne-connecte">
                <div style="margin:0 0 10px 0">
                    <span>
                        Personnes connectes
                    </span>
                </div>
                <personne-connecte :personneConnecte="personne" v-for="personne in personnes" :key="personne.id"/>
            </div>
        </div>
    </div>
</template>

<script>
import PersonneConnecteVue from './PersonneConnecte.vue';
import StatCard from './StatCard.vue';
import LaUne from './LaUne.vue';
    export default {
        data() {
            return {
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
                message: "Bonjour le monde"
            }
    },
        components:{
    StatCard,
    "personne-connecte": PersonneConnecteVue,
    LaUne
},
        methods: {
    showAlert() {
      // Use sweetalert2
      this.$swal('Hello Vue world!!!');
    },
  },
        mounted() {
            console.log('Component mounted.')
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
    margin: 15px;
    padding: 5px 15px 10px 15px;
}

.documents{
    background-color: #ffffff;
    border-radius: 20px;
    margin: 15px;
    padding: 5px 15px 10px 15px;
}

.personne-connecte span{
    font-size:18px;
}

.documents span{
    font-size:18px;
}

.row{
    margin: 0;
}
</style>
