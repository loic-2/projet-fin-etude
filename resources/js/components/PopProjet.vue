<template>
    <div class="pop">
        <div class="container-flex">
            <div v-if="show">
                <div class="row text-center pb-1">
                    <h3>{{projet.NOM_PROJET}}</h3>
                    <h6>{{projet.PROMOTION_PROJET}}</h6>
                    <span>
                        {{projet.TELECHARGEMENT_PROJET}}&nbsp;<font-awesome-icon class="download" icon="fa-solid fa-download" />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{projet.VUE_PROJET}}&nbsp;<font-awesome-icon class="view" icon="fa-solid fa-eye" />
                    </span>
                </div>
                <div class="row justify-content-center">
                    <div class="col">
                        <h5>Membres</h5>
                        <ul>
                            <li v-for="membre in membres" :key="membre.ID_MEMBRE" @click="show_membre(membre)">
                                <font-awesome-icon class="medal" icon="fa-solid fa-medal" /><span>&nbsp;</span>
                                {{membre.NOM_MEMBRE}}
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <h5>Encadreurs</h5>
                        <ul>
                            <li v-for="encadreur in encadreurs" :key="encadreur.ID_ENCADREUR" @click="show_encadreur(encadreur)">
                                <font-awesome-icon class="medal" icon="fa-solid fa-sun" /><span>&nbsp;</span>
                                {{encadreur.NOM_ENCADREUR}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <h5>Categories</h5>
                    <div class="categories row">
                        <Categorie class="col-3 pr-1" :categorie="{text:categorie.NOM_CATEGORIE,background:'#54c7f6'
                        }" v-for="categorie in categories" :key="categorie.ID_CATEGORIE"></Categorie>
                    </div>
                </div>
                <div class="row" style="margin:20px 0 0 0">
                    <div class="boutons text-center">
                        <button class="btn btn-success" @click="lire">Lire</button>
                        <button class="btn btn-primary" @click="editer">Modifier</button>
                        <button class="btn btn-danger" @click="supprimer(projet)">Supprimer</button>
                        <button class="btn btn-secondary" @click="fermer">Fermer</button>
                    </div>
                </div>
            </div>
            <div v-if="edit">
                <div class="row">
                    <label for="promotion">Promotion</label>
                    <select class="form-select" name="" style="margin-left:10px" v-model="promo" id="">
                        <option :value="option.value" v-for="option in options" :key="option.id">{{option.value}}</option>
                    </select>
                </div>
                <InputCustom @good="good($event)" :champ="projet_name"></InputCustom>
                <div class="row">
                    <label for="categorie">Categorie (s)</label>
                    <Multiselect label="name" track-by="name" v-model="categoriesSelected" :multiple="true" :searchable="true" :close-on-select="true" 
                    placeholder="Selectionner la/les categorie(s) du projet" :options="test"></Multiselect>
                </div>
                <div class="text-center p-2">
                    <button class="btn btn-danger pr-1" @click="view">Annuler</button>
                    <button class="btn btn-success " @click="save">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { deleteProjet, showEncadreur, showMembre, updateProjet } from "../StrongMethode";
import Categorie from "./Categorie.vue"
import InputCustom from "./InputCustom.vue";
import Select from "./Select.vue";
import Multiselect from "vue-multiselect";
import { store } from "../storage";
export default {
    data() {
        return {
            projet_name:
                {
                    text:"Theme",
                    type:"text",
                    valeur:this.projet.NOM_PROJET,
                    showlabel:true,
                    placeholder:"Entrer le theme du projet",
                    icon:'fa-solid fa-eye-slash',
                    hide:true,
                    id:1
                },
            options:store.getters.getPromotionMemoire,
            promo:this.projet.PROMOTION_PROJET,
            well:false,
            categoriesSelected:[],
            test:store.getters.getCategorie,
            show:true,
            edit:false,
        };
    },
    props: {
        projet: Object,
        membres: Array,
        encadreurs: Array,
        categories: Array,
    },
    methods: {
        save(){
            this.projet.PROMOTION_PROJET=this.promo;
            this.projet.NOM_PROJET=this.projet_name.valeur
            updateProjet(this.projet,this.categoriesSelected).then(res =>{
                this.view();
                this.$emit('actualise')
            })
        },
        supprimer(val){
            deleteProjet([val]).then(res => {this.$emit('actualise')})
            this.view()
            this.fermer()
        },
        good(val){
            this.well=val;
        },
        show_membre(value) {
            showMembre(value)
        },
        show_encadreur(value){
            showEncadreur(value)
        },
        view(){
            this.edit=false;
            this.show=true;
        },
        editer(){
            this.categories.forEach(categorie => {
                this.categoriesSelected.push({name:categorie.NOM_CATEGORIE,ID_CATEGORIE:categorie.ID_CATEGORIE})
            });
            this.show=false;
            this.edit=true;
        },
        fermer(){
            this.$emit('fermer');
        },
        lire(){
            this.fermer()
            const tab= this.projet.LIEN_FICHIER_PROJET.split('/')
            console.log(tab[1])
            this.$router.push('/lire/'+tab[1])
        }
    },
    components: { Categorie, InputCustom, Select, Multiselect }
}
</script>
<style scoped>
.pop{
    z-index: 99;
    position: fixed;
    top: 0;
    left: 0;
    padding: 0 100px 0 100px;
    bottom: 0;
    background-color: rgba( 202, 196, 194, 0.4);
}
.pop>div{
    margin: 150px;
    padding: 25px 50px 25px 50px;
    border-radius: 20px;
    height:400px;
    overflow-y: scroll;
    background-color: #ffffff;
}
::-webkit-scrollbar{
    width: 0.5em;
}
::-webkit-scrollbar-track{
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 20px;
    margin-block: 20px;
}
::-webkit-scrollbar-thumb:hover{
    background-color: rgba(0, 0, 0, 0.4);
    border-radius: 20px;
}

ul{
    list-style: none;
}
ul>li{
    cursor: pointer;
    text-decoration: none;
}
.medal{
    color: gold;
}
.categories{
    padding-left: 35px;
}
.view{
    color:  #54ccf6;
}
.download{
    color:  #54f672;
}
</style>