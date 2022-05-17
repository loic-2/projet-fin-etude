<template>
    <div class="container-flex ">
        <div class="row">
            <navbar class="col-md-2  position-fixed"/>
            <div class="col-md-10 offset-2">
                <router-view/>
            </div>
        </div>
    </div>
</template>
<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import NavbarVue from './Navbar.vue'
import Page2 from './Page2.vue'
export default {
    components:{
        'navbar':NavbarVue,
        'font-awesome-icon': FontAwesomeIcon,
        'page-2':Page2
    }
}
</script>
<style scoped>
.col-md-10{
    padding: 0;
}
.col-md-2{
    padding-right: 0;
    overflow: hidden;
}
</style>