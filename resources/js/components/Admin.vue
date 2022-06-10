<template>
    <div class="container-flex" style="margin-top:50px;">
        <State :routes="routes" style="margin-bottom:40px"></State>
        <div class="row group-box">
            <div class="row action" style="margin-bottom:10px">
                <div class="col">
                    <ButtonCustom :button="ajouter" @ajoutAdmin="showAlert"></ButtonCustom>
                    <ButtonCustom :button="supprimer"></ButtonCustom>
                </div>
                <div class="col-3">
                    <InputCustom :champ="recherche"></InputCustom>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <ButtonCustom :button="filtre"></ButtonCustom>
                </div>
            </div>
        </div>
        <DataTable :colonnes="colonnes" :edit="true" :trash="true" :donnees="donnees" class="tableau"></DataTable>
    </div>
</template>

<script>
import DataTable from './DataTable.vue';
import ButtonCustom from './ButtonCustom.vue';
import InputCustom from './InputCustom.vue';
import State from './State.vue'
import { index } from '../api';
    export default {
        data() {
            return {
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
                        reference:"LOGIN_ADMINISTRATEUR",
                        type:"String",
                        key:2,
                        sortable:true
                    },
                    {
                        nom:"Date Ajout",
                        reference:"DATE_CREATION_ADMINISTRATEUR",
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
        },
        mounted(){
            const reponse= index('http://localhost:8000/api/administrateur')
            reponse.then(res => {this.donnees=res.data})
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
    margin-bottom: 40px;
}
</style>
