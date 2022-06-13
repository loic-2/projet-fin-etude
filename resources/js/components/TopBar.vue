<template>
    <div class="top-bar container-flex">
        <div class="row py-2 px-2">
            <div class="col">
                <span>
                    <font-awesome-icon id="menu-bar" icon="fa-solid fa-bars" @click="$emit('hide')" v-if="hide"/>
                    <font-awesome-icon id="menu-bar" icon="fa-solid fa-times" @click="$emit('hide')" v-else/>
                    <span>&nbsp;</span><span>&nbsp;</span>
                    <span class="state">{{nom}}</span>
                </span>
            </div>
            <div class="col text-end">
                <div>
                    <font-awesome-icon icon="fa-solid fa-bell" />
                    <span class="vertical-line"></span>
                    <span class="name">{{username}}</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
                    <font-awesome-icon class="icon" id="compte" icon="fa-solid fa-circle-user" @click="showProfile"/>
                </div>
            </div>
        </div>
        <div class="row justify-content-end"  v-if="profile">
            <div class="col-4  profile align-self-end" style="background-color:#ffffff">
                <ul>
                    <li @click="profile">Profile</li>
                    <li @click="logout">Deconnexion</li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
import {authentication, store} from '../storage'
import { mapGetters } from 'vuex'
import { logout } from '../StrongMethode'
export default { 
    computed:{
        getName(){
            this.nom= store.getters.getBarName
        }
    },
    data(){
        return{
            username:store.getters.getUsername,
            nom:'',
            profile:false
        }
    },
    props:{
        namepage:{
            type: String,
            default: "Tableau de bord"
        },
        hide:{
            type:Boolean,
            default: false
        }
    },
    methods:{
        logout(){
            logout();
        },
        showProfile(){
            this.profile= !this.profile
        }
    },
    mounted(){
        this.getName
    }
}
</script>
<style scoped>
.top-bar{
    margin: 0;
    padding: 0;
}
.vertical-line{
    border-left: 3px #000000 solid;
    margin-left: 30px;
    margin-right: 20px;
    height: 40px;
}
.col,.col-4{
    padding: 0;
}
.row{
    margin: 0;
}
#menu-bar{
    cursor: pointer;
}
#compte{
    cursor: pointer;
}
.profile{
    width: 150px;
    z-index: 2;
    border-radius: 5px;
    margin-right: 20px;
}
.profile ul{
    list-style: none;
    margin: 0;
    padding: 0;
}

.profile ul li{
    margin: 0;
    padding:5px;
}
.profile ul li a{
    text-decoration: none;
    color: #363740;
}

.profile ul li:hover{
    border-left: 3px #363740 solid;
    cursor: pointer;
    border-radius: 5px;
    background-color: rgba(54, 55, 64, .3);
}

</style>