<template>
    <div class="row" style="margin:0 0 45px 0">
        <div class="col">
            <span class="state"> 
            <router-link to="/dashboard">Tableau de bord</router-link>
            <router-link :to="route.path" v-for="route in routes" :key="route.id"> > {{route.Name}}</router-link> 
        </span>
        </div>
        <div class="col text-end">
            <font-awesome-icon class="retour" icon="fa fa-arrow-alt-circle-left" @click="goto()"/>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        routes:{
            type:Array,
        }
    },
    methods:{
        goto(){
            this.$router.back();
        }
    }
}
</script>

<style scoped>
.state a, .state{
    list-style: none;
    text-decoration: none;
    color: #363740;
}
.retour{
    color: #363740;
    cursor: pointer;
    height: 20px;
}
.col{
    padding: 0 15px 0 15px;
}
</style>