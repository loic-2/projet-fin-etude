<template>
    <ajout-projet style="margin-top:50px" :addetudiant="false" :annee="annee"></ajout-projet>
</template>

<script>
import AjoutProjet from './AjoutProjet.vue'
export default {
    data(){
        return{
            annee:[
                {
                    value:"2017 - 2019",
                    id:1
                },
                {
                    value:"2018 - 2020",
                    id:2,
                }
                ,
                {
                    value:"2019 - 2021",
                    id:3,
                }
            ],
        }
    },
    components: { 
      AjoutProjet 
    }
}
</script>
<style scoped>

</style>
