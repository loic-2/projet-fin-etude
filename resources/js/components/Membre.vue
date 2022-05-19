<template>
    <div class="membre" style="margin-top:10px;margin-left:25px;margin-right:25px">
        <inputcustom :champ="champ" v-for="champ in champs" :key="champ.id"></inputcustom>
        <filiere :parametres="parametres" :title="titre"></filiere>
    </div>
</template>
<script>
import FiliereVue from "./Select.vue";
import InputCustomVue from "./InputCustom.vue";

export default {
   props:{
       titre:{
           type:String,
       },
       champs:{
           type:Array
       },
       parametres:{
           type:Array
       }
   },
    components:{
        'inputcustom': InputCustomVue,
        'filiere': FiliereVue
    }
}
</script>