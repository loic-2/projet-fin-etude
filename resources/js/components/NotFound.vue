<template>
    <div class="container-flex" style="background-image: url('https://shrouded-brushlands-38845.herokuapp.com/storage/img/notfound.png');width:100%;
    background-size:cover">
        <div class="row text-center">
            <input type="submit" class="btn col-2 offset-5 my-1 btn-primary" @click="goBack" value="Retour a l'acceuil">
        </div>
    </div>
</template>
<script>
export default {
    methods:{
        goBack(){
            this.$router.back();
        }
    }
}
</script>
<style scoped>
.container-flex{
    overflow: hidden;
    height: 93vh;
}
.btn{
    border-radius: 20px;
}
.row{
    position: relative;
    margin: 0;
    top: 62%;
}

</style>