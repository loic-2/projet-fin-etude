<template>
    <div class="container-flex">
        <div class="row ">
            <div class="col-md-2  position-fixed " :class="{'hide':hide}">
                <navbar />
            </div>
            <div  :class="[ !hide? 'col-md-10 offset-2' : 'col-md-12']">
                <div class="row ">
                    <TopBar :hide="hide" position-fixed @hide='masquer'></TopBar>
                </div>
                <router-view/>
            </div>
        </div>
    </div>
</template>
<script>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import NavbarVue from './Navbar.vue'
import Pfe from './Pfe.vue'
import TopBar from './TopBar.vue'
export default {
    data(){
        return{
            hide: false
        }
    },
    components:{
    "navbar": NavbarVue,
    "font-awesome-icon": FontAwesomeIcon,
    "pfe": Pfe,
    TopBar
    },
    methods:{
        masquer(){
            this.hide=!this.hide 
            console.log(this.hide)
        }
    }
}
</script>
<style scoped>
.col-md-10{
    padding: 0;
    background-color: rgba(236, 221, 221, 0.363);
    height: 100vh;
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;
    overflow-x: hidden;
}

.row{
    margin: 0;
}

.col-md-12{
    padding: 0;
    background-color: rgba(236, 221, 221, 0.363);
    height: 100vh;
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;
    scrollbar-width: none;
    overflow-x: hidden;
}



.col-md-2{
    padding: 0;
    overflow: hidden;
}

.hide{
    visibility: hidden;
}
</style>