<template>
    <div class="container-flex position-fixed top-bar row mx-0  py-2">
        <div class="col-md-8 col-xs">
            <span>
                <font-awesome-icon id="menu-bar" icon="fa-solid fa-bars" @click="$emit('hide')" />
                <span>&nbsp;</span><span>&nbsp;</span>
                <span class="state">{{namepage}}</span>
            </span>
        </div>
        <div class="col-md-4 col-xs">
            <font-awesome-icon icon="fa-solid fa-bell" />
            <span class="vertical-line"></span>
            <span class="name">Ganno Loic</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
            <font-awesome-icon class="icon" id="compte" icon="fa-solid fa-circle-user" @click="showProfile"/>
            <div class="row profile" style="background-color:#ffffff" v-if="profile">
                <ul>
                    <li><router-link to="/profile">Profile</router-link></li>
                    <li><router-link to="/connexion">Deconnexion</router-link></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            profile:false
        }
    },
    props:{
        namepage:{
            type: String,
            default: "Tableau de bord"
        }
    },
    methods:{
        showProfile(){
            this.profile= !this.profile
        }
    }
}
</script>
<style scoped>
.top-bar{
    height: 40px;
    background-color: rgb(209, 212, 211);
}
.vertical-line{
    border-left: 3px #000000 solid;
    margin-left: 30px;
    margin-right: 20px;
    height: 40px;
}
.col{
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
    position: relative;
    width: 150px;
    right: -30px;
    z-index: 2;
    border-radius: 5px;
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
    border-radius: 5px;
    background-color: rgba(54, 55, 64, .3);
}

</style>