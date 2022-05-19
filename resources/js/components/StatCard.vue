<template>
     <div class="stat col offset-2 px-0" >
        <div class="nom-parametre" :style="{backgroundColor:parametre.color}">
            <span>{{parametre.nom}}</span>
        </div>
        <div class="valeur">
            <span>{{parametre.valeur}}</span>
        </div>
    </div>   
</template>
<script>
export default {
    props:{
        parametre:{
            type: Object,
            default:()=>({
                nom:"Memoires",
                color:'blue',
                valeur:"145"
            }),

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
    margin: 50px 15px 0 15px;
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