<template>
    <div class="row">
        <state :routes="routes"></state>
        <Button @click="affiche">test</Button>
        <ajout-projet style="margin-top:50px" :etudiant="etudiant" :addetudiant="true" :annee="annee"></ajout-projet>
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
            etudiant:[
                [{
                    text:"Nom",
                    type:"text",
                    valeur:'aa',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }],
                [
                    {
                    text:"Nom",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ],
                [
                    {
                    text:"Nom",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ],
                [
                    {
                    text:"Nom",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ],
                [
                    {
                    text:"Nom",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ],
                [
                    {
                    text:"Nom",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le nom complet",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:false,
                    id:1
                },
                {
                    text:"Matricule",
                    type:"text",
                    valeur:'',
                    placeholder:"Entrer le matricule",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:'',
                    placeholder:"+237",
                    showlabel:true,
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ]
            ],
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
      ButtonGroup,
      State
    },
    methods:{
        affiche(){
            console.log(this.etudiant[0][0].valeur)
        }
    },
    mounted(){
        this.affiche()
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
