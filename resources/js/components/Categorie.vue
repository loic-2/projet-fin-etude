<template>
    <div class="cat" :style="{backgroundColor:categorie.background}">
        <p>
            {{categorie.text}}
        </p>
    </div>
</template>
<script>
export default {
    props:{
        categorie:{
            text:{
                type:String,
            },
            background:{
                type: String,
            },
            id:{
                type: String
            }
        }
    }
}
</script>

<style scoped>
.cat{
    height: 30px;
    text-align: center;
    font-size: 15px;
    padding-top:5px;
    padding-bottom: 5px;
    color: #363740;
    margin: 5px 0 5px 0;
    border-radius: 20px;
}
</style>