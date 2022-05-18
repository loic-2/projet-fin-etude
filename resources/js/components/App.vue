<template>
    <div class="container-flex ">
        <div class="row">
            <navbar class="col-md-2  position-fixed "/>
            <div class="col-md-10 offset-2 " >
                <router-view/>
            </div>
        </div>
    </div>
</template>
<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import NavbarVue from './Navbar.vue'
import Pfe from './Pfe.vue'
export default {
    components:{
        'navbar':NavbarVue,
        'font-awesome-icon': FontAwesomeIcon,
        'pfe':Pfe
    }
}
</script>
<style scoped>
.col-md-10{
    padding: 0;
    background-color: red;
    height: 100vh;
    overflow-y:scroll
}


.col-md-2{
    padding-right: 0;
    margin-left: 0;
    overflow: hidden;
}
</style>