<template>   
   <div class="grp_selection">
       <label for="Filiere" class="title">{{title}}</label><br>
       <select id="" v-model="valeur_selectionner" class="selection form-select" @change="update" >
            <option :value="parametre.value" v-for="parametre in parametres" :key="parametre.id">{{parametre.value}}</option>
        </select> 
   </div>
</template>
<script>
import { storeSelect } from "../storage"
export default {
    data(){
        return{
            valeur_selectionner:''
        }
    },
    props:{
        title: String,
        filiere:{
            type:String
        },
        parametres:{
            value: String,
            id: String,

        }
    },
    methods:{
        update(){
            storeSelect(this.filiere ,this.valeur_selectionner)
        }
    }
}

</script>

<style scoped>
.selection{
    padding-left: 10px;
    padding-right: 10px;
    background-color: #ffffff;
    height: 40px;
    border-radius: 10px;
    border: 1px #363740 solid;
}
.grp_selection{
    margin-top: 15px;
}
.selection{
    width: 100%;
}
</style>