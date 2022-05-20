<template>
    <div class="row" style="margin:0 0 5px 0">
        <div class="col-1">
            <font-awesome-icon icon="fa-solid fa-circle-user" style="height:25px" :style="{color:personneConnecte.color}"/>
        </div>
        <div class="col-10 offset-1" >
            <span class="nom-user-connecte">
                {{personneConnecte.nom}}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        personneConnecte:{
            nom:{
                type:String,
            },
            color:{
                type: String,
            }
        }
    }
}
</script>

<style scoped>
.nom-user-connecte{
    color: #363740;
}
</style>