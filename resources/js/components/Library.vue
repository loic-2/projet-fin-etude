<template>
  <div class="row">
    <State :routes="routes"/>
    <div class="action row">
        <div class="col-md-3 col-sm-4 col-xm-4">
            <button @click="addCategorie" class="add-categorie btn btn-dark"><font-awesome-icon icon="plus"/>  Ajouter</button>
        </div>
        <div class="col-md-4 col-sm-5 col-xm-6 offset-lg-5 offset-md-5 offset-sm-3 offset-xm-2 ">
            <input type="text" name="" id="" placeholder="Rechercher..." class="form-control recherche">
        </div>
    </div>
    <div class="row total" style="margin-bottom:35px;">
        <div class="col-2 col-xm-4 offset-10 offset-xm-8">
            <label for="total">Total: </label><span>{{categories.length}}</span>
        </div>
    </div>
    <ModeleCategorie :categorie="categorie" v-for="categorie in categories" :key="categorie.ID_CATEGORIE"/>
  </div>
</template>

<script>
import { index } from '../api'
import { store } from '../storage'
import ModeleCategorie from './ModeleCategorie.vue'
import State from './State.vue'
export default {
  components: { ModeleCategorie, State },
  data() {
    return {
        categories:Array,
        routes:[
                    {
                        Name:"Categorie",
                        path:"/admin",
                        id:1
                    }
                ]
    }
  },
  methods:{
    actualise(){
            const res=index('http://localhost:8000/api/categorie')
            res.then(res =>{
                this.categories=res.data
            })
        },
    addCategorie(){
        this.$swal.fire({
            title:"Ajouter une categorie",
            inputLabel:"Nom de la categorie",
            confirmButtonText:"Enregister",
            cancelButtonText:"Annuler",
            showCancelButton:true,
            inputValue:""
        })
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