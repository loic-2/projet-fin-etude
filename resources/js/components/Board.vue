<template>
    <div class="container-flex">
        <div class="row">
            <StatCard :parametre="parametre" v-for="parametre in parametres" :key="parametre.id"></StatCard>
        </div>
    </div>
</template>
<script>
import StatCard from './StatCard.vue'
export default {
  components: { StatCard },
  data(){
      return{
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
</style>