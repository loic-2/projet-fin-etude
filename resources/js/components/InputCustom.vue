<template>
    <div class="input">
        <label :for="champ.text" class="title">{{champ.text}}</label><br>
        <input :type="champ.type" class="valeur" :class="{'erreurborder': !test}" v-model="valeur" :placeholder="champ.placeholder" @input="controle">
        <font-awesome-icon :icon="champ.icon" :style="{'color':color}" class="icon" :class="{'hide':champ.hide}"/>
    </div>
</template>

<script>
export default {
    data(){
        return{
            valeur:'',
            test: true,
            color: "#363740"
        }
    },
    props:{
        champ:{
            type:Object,
            default:()=>({
                text:"Bouton",
                type:"password",
                placeholder:"Entrer ...",
                icon:'fa-solid fa-eye-slash',
                controle: {
                    type: Function
                }

            })
        },
    },
    methods:{
        controle(){
            this.champ.hide=false;
            if (this.valeur.length <=12) {
                this.champ.icon='fa-solid fa-times'
                this.color="red"
                this.test=false
            }else{
                this.champ.icon='fa-solid fa-check'
                this.color="green"
                this.test= true
            }
        },
    },
}
</script>

<style scoped>
input{
    margin-top: 3px;
    padding-left: 10px;
    padding-right: 30px;
    background-color: #ffffff;
    height: 40px;
    width: 100%;
    border-radius: 10px;
    border: 1px #363740 solid;

}

.hide{
    display: none;
}
.title{
    margin-top: 10px;
    color:#363740;
}
.input{
    display: block;
}
.icon{
    position: absolute;
    padding: 15px;
    padding-left: 0;
    margin-left: -25px;
}
.erreurborder {
    border: 1px red solid;
}

</style>