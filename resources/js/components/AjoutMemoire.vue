<template>
    <div class="row">
        <state :routes="routes"></state>
        <ajout-projet style="margin-top:20px" :addetudiant="false" :annee="annee"></ajout-projet>
        <ButtonGroup :buttons="buttons"></ButtonGroup>
    </div>
</template>

<script>
import AjoutProjet from './AjoutProjet.vue'
import ButtonCustom from './ButtonCustom.vue'
import ButtonGroup from './ButtonGroup.vue'
import State from './State.vue'
export default {
    data(){
        return{
            routes:[
                {
                    Name:"Memoires",
                    path:"/memoire",
                    id:1,
                },
                {
                    Name:"Ajout de memoire",
                    path:"/ajoutmemoire",
                    id:2,
                }
            ],
            buttons:[
                {
                    text:"Annuler",
                    reference:"annulerMemoire",
                    icon:"fa-solid fa-undo",
                    id:1
                },
                {
                    text:"Enregistrer",
                    reference:"enregistrerMemoire",
                    icon:"fa-solid fa-save",
                    id:2
                }
            ],
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
    AjoutProjet,
    ButtonCustom,
    ButtonGroup,
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
