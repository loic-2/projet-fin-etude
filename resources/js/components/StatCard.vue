<template>
     <div class="stat col px-0" >
        <div class="nom-parametre" :style="{backgroundColor:color}">
            <span>{{nom}}</span>
        </div>
        <div class="valeur">
            <span>{{valeur}}</span>
        </div>
    </div>   
</template>
<script>
export default {
    props:{
        nom:{
            type:String,
            default:"Memoires",
        },
        color:{
            type:String,
            default:'blue',
        },
        valeur:{
            type:Number,
            default:145
        },
        }
    }
</script>
<style scoped>
.stat{
    background-color: #ffffff;
    color:#000000;
    border-radius:20px;
    height: 200px;
    margin: 15px;
}

.nom-parametre{
    border-radius: 20px 20px 0 0;
    height: 50px;
    font-size: 20px;
    padding-top: 7.5px;
    align-items: center;
    text-align: center;
}
.valeur{
    text-align: center;
    font-size: 50px;
    padding-top:25px;
    padding-bottom: 25px;
}
</style>