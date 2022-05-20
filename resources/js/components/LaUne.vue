<template>
    <div class="row laune">
        <hr>
        <div class="col-10">
            <span>
                {{document.titre}}
            </span>
        </div>
        <div class="col-2">
            <card :categorie="document" style="margin: 0 0 5px 0;"/>
        </div>
    </div>
</template>

<script>
import CategorieVue from "./Categorie.vue";

export default {
    components:{
        'card': CategorieVue
    },
    props:{
        document:{
                titre:{
                    type:String,
                },
                text:{
                    type: String,
                },
                background:{
                    type:String,
                },
                id:{
                    type:String,
                }
            },
    }
}
</script>
<style scoped>
.row{
    margin: 0;
}
.row hr{
    margin: 0 0 5px 0;
}

.laune{
    height: 40px;
}
</style>