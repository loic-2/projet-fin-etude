<template>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xm-12">
        <div class="row" style="padding:15px">
            <div class="col-10">
                <div class="title">
                    <h3>{{categorie.NOM_CATEGORIE}}</h3>
                </div>
                <div class="detail">
                    {{categorie.DESCRIPTION_CATEGORIE}} 
                </div>
                <div class="nombre">
                    {{categorie.NOMBRE_PROJET}} projets
                </div>
            </div>
            <div class="col-2 align-self-center" style="padding-right:3px">
                <font-awesome-icon class="icon" icon="circle-chevron-right" style="color:#fff"/>
            </div>
            <div class="delete">
                <button class="show btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    props:{
        categorie:Object
    },
    methods:{
        
    }
}
</script>

<style scoped>
.col-lg-4{
    padding: 0;
}
.row{
    margin: 0;
    text-align: center;
    font-size: 20px;
    padding-top:5px;
    padding: 5px 0 10px 0;
    margin-bottom: 20px;
    margin-left: 5px;
    margin-right: 5px;
    color: #fff;
    background-color: #63636475;
    border-radius: 20px;
    height: 150px;
}

.icon{
    width: 30px;
    height: 30px;
}
.delete{
    display: none;
}
.row:hover{
}
</style>