<template>
    <div class="container-flex">
        <div class="row ">
            <div class="position-fixed" :class="[hide? 'hide':'col-md-3 col-lg-2 col-sm-0']">
                <navbar />
            </div>
            <div  :class="[!hide? 'col-md-9 offset-md-3 col-lg-10 offset-lg-2 col-sm-12':'col-md-12 col-lg-12 col-sm-12']" >
                <div class="row row-cols-1">
                    <TopBar :hide="hide" class="fixed-top" style="height: 40px;background-color: rgb(209, 212, 211);" @pagename='(n)=>console.log(n)' @hide="masquer" :namepage="namepage"></TopBar>
                    <router-view style="margin-top:45px; padding:0"/>
                </div>
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
            hide: true,
            namepage:"Tableau de bord"
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
        },
        affiche(val){
            console.log(val)
        }
    }
}
</script>
<style scoped>
.col-md-9{
    padding: 0;
    background-color: rgba(236, 221, 221, 0.363);
    height: 100vh;
    -ms-overflow-style: none;  /* Internet Explorer 10+ */
    scrollbar-width: none;
    overflow-x: hidden;
}
.col-md-9,.col-md-3,.col-lg-12,.col-lg-10,.col-lg-2{
    padding: 0;
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



.col-md-3{
    padding: 0;
    overflow: hidden;
}

.hide{
    display: none;
}
</style>