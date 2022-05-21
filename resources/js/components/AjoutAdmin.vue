<template>
    <div class="row">
        <State :routes="routes"></State>
    </div>
</template>

<script>
import State from "./State.vue";
export default {
    components: { 
        State
    },
    data(){
        return{
            routes:[
                {
                    Name:"Administrateur",
                    path:"/admin",
                    id:1,
                },
                {
                    Name:"Ajout d'administrer",
                    path:"/ajoutadmin",
                    id:2,
                }
            ],
        }
    }
}
</script>

<style scoped>

</style>