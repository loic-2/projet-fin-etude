<template>
    <div class="row">
        <state :routes="routes"></state>
        <ajout-projet style="margin-top:50px" :addetudiant="true" :annee="annee"></ajout-projet>
        <div class="row enregistrement" style="margin:20px 0 20px 0">
            <div class="col text-center">
                <button-custom :button="button" v-for="button in buttons" :key="button.id" style="margin:0 15px 0 15px"></button-custom>
            </div>
        </div>
    </div>
</template>

<script>
import AjoutProjet from './AjoutProjet.vue'
import ButtonCustom from './ButtonCustom.vue'
import State from './State.vue'
export default {
    data(){
        return{
            routes:[
                {
                    Name:"Projets de fin d'etude",
                    path:"/pfe",
                    id:1,
                },
                {
                    Name:"Ajout de PFE",
                    path:"/ajoutpfe",
                    id:2,
                }
            ],
            buttons:[
                {
                    text:"Annuler",
                    reference:"annulerPfe",
                    icon:"fa-solid fa-undo",
                    id:1
                },
                {
                    text:"Enregistrer",
                    reference:"enregistrerPfe",
                    icon:"fa-solid fa-save",
                    id:2
                }
            ],
            annee:[
                {
                    value:"2016 - 2019",
                    id:1
                },
                {
                    value:"2017 - 2020",
                    id:2
                },
                {
                    value:"2018 - 2021",
                    id:3,
                }
                ,
                {
                    value:"2019 - 2022",
                    id:4,
                }
            ],
        }
    },
    components: { 
      AjoutProjet,
      ButtonCustom,
      State
    }
}
</script>
<style scoped>
.row{
    margin: 0;
}
.col{
    padding: 0;
}
</style>
