<template>
    <button :style="{color:button.textColor}" :class="button.style" @click="$emit(button.reference)">
        <font-awesome-icon :icon="button.icon"/>
        {{button.text}}
    </button>
</template>

<script>
export default {
    props:{
        button:{
            type:Object,
            default:()=>({
                text:"Bouton",
                reference,
                style:'btn-alert',
                textColor:'#363740',
                icon:'fa-solid fa-undo',

            })
        },
    }
}
</script>

<style scoped>
button{
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    background-color: #ffffff;
    height: 40px;
    border-radius: 10px;
    border: 1px #363740 solid;

}
</style>