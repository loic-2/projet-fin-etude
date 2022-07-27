<template>
    <div class="row" style="margin:0 0 5px 0">
        <div class="col-3">
            <font-awesome-icon icon="fa-solid fa-circle-user" style="height:25px" :style="{color:color}"/>
        </div>
        <div class="col-9" >
            <span class="nom-user-connecte">
                {{personneConnecte.name}}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            color:"#1B32FB",
        }
    },
    props:{
        personneConnecte:{
            nom:{
                type:String,
            },
        }
    }
}
</script>

<style scoped>
.nom-user-connecte{
    color: #363740;
}
</style>