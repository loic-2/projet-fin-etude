<template>
    <div class="container-flex" style="margin-top:50px;">
        <State :routes="routes" style="margin-bottom:40px"></State>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:5px">
                <div class="col mt-2">
                    <ButtonCustom :button="ajouter" @ajoutAdmin="showAlert"></ButtonCustom>
                    <ButtonCustom @supAdmin="supprimerAdmin" :button="supprimer"></ButtonCustom>
                </div>
                <div class="mt-lg-2 mt-md-2 mt-sm-2 mt-4 col-lg-3 col-md-3 col-sm-5 col-10 offset-lg-4 offset-md-4 offset-sm-2 offset-2">
                    <InputCustom @search="resultatRecherche" :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-6 offset-lg-9 offset-md-9 offset-sm-9 offset-6 text-end">
                    <select name="" id="" title="Choisir le mode de recherche" class="form-select" v-model="mode">
                        <option value="NOM_ADMINISTRATEUR">Nom</option>
                        <option value="name">Login</option>
                        <option value="email">Email</option>
                    </select>
                </div>
            </div>
        </div>
        <DataTable @actualise="actualise" :colonnes="colonnes" :edit="true" :trash="true" :donnees="donnees" class="tableau"></DataTable>
    </div>
</template>

<script>
import DataTable from './DataTable.vue';
import ButtonCustom from './ButtonCustom.vue';
import InputCustom from './InputCustom.vue';
import State from './State.vue'
import { index } from '../api';
import { store } from '../storage';
import { verifyToDelete } from '../StrongMethode';
    export default {
        data() {
            return {
                mode:"NOM_ADMINISTRATEUR",
                routes:[
                    {
                        Name:"Administrateur",
                        path:"/admin",
                        id:1
                    }
                ],
                ajouter:{
                    text:"Ajouter",
                    style:'btn-alert',
                    reference:'ajoutAdmin',
                    textColor:'#363740',
                    icon:'fa-solid fa-user-plus',
                },
                supprimer:{
                    text:"Supprimer",
                    reference:'supAdmin',
                    style:'btn-alert',
                    textColor:'#363740',
                    icon:'fa-solid fa-user-times',
                },
                filtre:{
                    text:"Filtrer",
                    style:'btn-alert',
                    textColor:'#363740',
                    icon:'fa-solid fa-filter',
                },
                recherche:{
                    text:"",
                    type:"text",
                    valeur:"",
                    placeholder:"Rechercher...",
                    icon:'fa-solid fa-magnifying-glass',
                    showlabel:false,
                    hide:true
                },
                donnees:[],
                colonnes:[
                    {
                        nom:"Nom",
                        reference:"NOM_ADMINISTRATEUR",
                        type:"String",
                        key:1,
                        sortable:true
                    },
                    {
                        nom:"Login",
                        reference:"name",
                        type:"String",
                        key:2,
                        sortable:true
                    },
                    {
                        nom:"Email",
                        reference:"email",
                        type:"String",
                        key:3,
                        sortable:true
                    },
                    {
                        nom:"Date Ajout",
                        reference:"created_at",
                        type:"String",
                        key:4,
                        sortable:true
                    },
                ],
            }
    },
        components:{
            DataTable,
            ButtonCustom,
            InputCustom,
            State,
        },
        methods: {
            showAlert() {
            // Use sweetalert2
            this.$router.push('/ajoutadmin')
            //this.$swal('Hello Vue world!!!');
            },
            actualise(){
                const reponse= index(store.getters.getDomain+'api/users')
                reponse.then(res => {this.donnees=res.data})
            },
            resultatRecherche(){
                if (this.recherche.valeur==="") {
                    this.actualise()
                } else {
                    const reponse= index(store.getters.getDomain+`api/searchadmin/?valeur=${this.recherche.valeur}&mode=
                    ${this.mode}`)
                    reponse.then(res => {this.donnees=res.data})
                    
                }
            },
            supprimerAdmin(){
                verifyToDelete(this.$router).then(res => {
                    this.actualise()
               })
            }
        },
        mounted(){
            store.state.suppressList=[];
            this.actualise()
            this.$emit("pagename","Administrateur")
        }
    }
</script>
<style scoped>

.row{
    margin: 0;
}

.tableau{
    margin:0 15px 15px 15px;
}
.col-3, .col{
    padding: 0;
}
.group-box{
    margin-bottom: 60px;
}
</style>
