<template>   
   <div class="grp_selection">
       <label for="Filiere" class="title">{{title}}</label><br>
       <select name="filiere" id="" class="selection">
            <option value="parametre.value" v-for="parametre in parametres" :key="parametre.id">{{parametre.value}}</option>
        </select> 
   </div>
</template>
<script>
export default {
    props:{
        title: String,
        parametres:{
            value: String,
            id: String,

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