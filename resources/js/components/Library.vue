<template>
  <div class="row">
    <State :routes="routes"/>
    <div class="action row">
        <div class="col-md-3 col-sm-4 col-6 mt-2 mb-2">
            <button @click="addCategorie" class="add-categorie btn btn-dark"><font-awesome-icon icon="plus"/>  Ajouter</button>
        </div>
        <div class="col-md-4 col-sm-5 col-12 offset-lg-5 offset-md-5 offset-sm-3 mt-2 mb-2 ">
            <input type="text" v-model="valeur" @input="rechercher" name="" id="" placeholder="Rechercher..." class="form-control recherche">
        </div>
    </div>
    <div class="row total" style="margin-bottom:35px;">
        <div class="col-lg-1 col-md-2 col-sm-2 col-4 offset-lg-11 offset-md-10 offset-sm-10 offset-8">
            <label for="total">Total: </label><span>{{categories.length}}</span>
        </div>
    </div>
    <ModeleCategorie :categorie="categorie" v-for="categorie in categories" :key="categorie.ID_CATEGORIE"/>
  </div>
</template>

<script>
import { index } from '../api'
import { store } from '../storage'
import { addCategorie } from '../StrongMethode'
import ModeleCategorie from './ModeleCategorie.vue'
import State from './State.vue'
export default {
  components: { ModeleCategorie, State },
  data() {
    return {
        categories:Array,
        valeur:"",
        routes:[
                    {
                        Name:"Categorie",
                        path:"/categorie",
                        id:1
                    }
                ]
    }
  },
  methods:{
    actualise(){
            const res=index(store.getters.getDomain+"api/categorie")
            res.then(res =>{
                this.categories=res.data
            })
        },
    fetchdata(){
      const res= index(store.getters.getDomain+`api/searchcategorie?valeur=${this.valeur}`)
      res.then(res => {
        this.categories=res.data
      })
    },
    addCategorie(){
        addCategorie().then(res => {this.actualise})
    },
    rechercher(){
      if (this.valeur==="") {
        this.actualise()
      } else {
        this.fetchdata()
      }
    }
  },
  mounted(){
    store.state.suppressList=[]
    this.actualise()
  }

}
</script>

<style scoped>
.row{
    margin: 0;
}
</style>