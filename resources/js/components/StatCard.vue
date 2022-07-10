<template>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xm-12">
        <div class="stat px-0" >
            <div class="nom-parametre" :style="{backgroundColor:color}">
                <span>{{nom}}</span>
            </div>
            <div class="valeur">
                <span>{{valeur}}</span>
            </div>
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

.col-lg-4, .col-md-4, .col-sm-6, .col-xm-12{
    padding: 0;
}
.col-lg-4[data-v-7299848b]{
    padding: 0;
}
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