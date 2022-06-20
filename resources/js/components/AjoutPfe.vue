<template>
    <div class="row">
        <state :routes="routes"></state>
        <ajout-projet :encadreur="encadreur" :parametres1="parametre1" :intitule="intitule" :file="file" :valeurs_select="valeurs_select" style="margin-top:50px" :etudiant="etudiant" :addetudiant="true" :annee="annee"></ajout-projet>
        <div class="row" style="margin:20px 0 20px 0">
            <div class="col text-center">
                <button-custom :button="buttons[0]" style="margin:0 15px 0 15px"></button-custom>
                <button-custom @enregistrerPfe="enregistre" :button="buttons[1]" style="margin:0 15px 0 15px"></button-custom>
            </div>
        </div>
        <Loader v-if="show"></Loader>
    </div>


</template>

<script>
import AjoutProjet from './AjoutProjet.vue'
import ButtonCustom from './ButtonCustom.vue'
import ButtonGroup from './ButtonGroup.vue'
import State from './State.vue'
import {storeStudent,store,storeEncadreur,storeProjet} from '../storage'
import Loader from './Loader.vue'
import { createProjet } from '../StrongMethode'
export default {
    data(){
        return{
            show:false,
            parametre1:store.getters.getFilieresPfe,
            file:
                {
                    text:"Fichier",
                    type:"file",
                    valeur:'',
                    showlabel:true,
                    placeholder:"Selectionner le fichier",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
        intitule:
                {
                    text:"Theme",
                    type:"text",
                    valeur:'',
                    showlabel:true,
                    placeholder:"Entrer le theme",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                }, 
            valeurs_select:[
                'etudiant1',
                'etudiant2',
                'etudiant3',
                'etudiant4',
                'etudiant5',
                'etudiant6',
                'encadreur1',
                'encadreur2',
                'promotion'
            ],
            encadreur:[
                [{
                    text:"Nom",
                    type:"text",
                    valeur:"",
                    placeholder:"Entrer le nom complet",
                    icon:'fa-solid fa-eye-slash',
                    showlabel:true,
                    hide:true,
                    id:1
                },
                {
                    text:"Profession",
                    type:"text",
                    valeur:"",
                    showlabel:true,
                    placeholder:"Entrer la profession",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                },
                {
                    text:"Telephone",
                    type:"text",
                    valeur:"",
                    showlabel:true,
                    placeholder:"+237",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }],
                [{
                    text:"Nom",
                    type:"text",
                    valeur:"",
                    placeholder:"Entrer le nom complet",
                    icon:'fa-solid fa-eye-slash',
                    showlabel:true,
                    hide:true,
                    id:1
                },
                {
                    text:"Profession",
                    type:"text",
                    valeur:"",
                    showlabel:true,
                    placeholder:"Entrer la profession",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:2,
                }
                ,
                {
                    text:"Telephone",
                    type:"text",
                    valeur:"",
                    showlabel:true,
                    placeholder:"+237",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:3,
                }
                ]
            ], 
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
            annee:store.getters.getPromotionPfe,
        }
    },
    components: {
    AjoutProjet,
    ButtonCustom,
    ButtonGroup,
    State,
    Loader
},
    computed:{
        
    },
    methods:{
        storeData(){
            storeStudent(this.etudiant)
            storeProjet([this.intitule.valeur,'PFE'])
            storeEncadreur(this.encadreur)
        },
        async enregistre(){
            this.show=true
            this.storeData();
            setTimeout(() => {
                createProjet().then(res => {
                this.show=false
            })
            }, 10000);
        }
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
