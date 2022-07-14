<template>
    <div class="col-lg-3 col-md-4 col-sm-6 col-xm-12">
        <div class="row ele" style="padding:15px">
            <div class="row">
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
            </div>
            <div class="delete">
                <button @click="update(categorie)" class="btn btn-primary">Modifier</button>
                <button @click="deleteCategorie(categorie)" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</template>
<script>import { deleteCategorie, updateCategorie } from "../StrongMethode"


export default {
    props:{
        categorie:Object
    },
    methods:{
        deleteCategorie(value){
            deleteCategorie([value]).then(res => {this.$emit('actualise')})
        },
        update(value){
            updateCategorie(value).then(res => {this.$emit('actualise')})
        }
    }
}
</script>

<style scoped>
.col-lg-3{
    padding: 0;
}
.row{
    margin: 0;
}
.ele{
    margin: 0;
    text-align: center;
    font-size: 20px;
    padding-top:5px;
    padding: 5px 0 10px 0;
    margin-bottom: 20px;
    margin-left: 5px;
    margin-right: 5px;
    color: #fff;
    background-color: #837F7E;
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
.ele:hover .delete{
    display: block;
}
</style>