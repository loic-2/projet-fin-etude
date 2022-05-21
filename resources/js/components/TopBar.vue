<template>
    <div class="container-flex position-fixed top-bar row mx-0  py-2">
        <div :class="[ !hide? 'col-md-8' : 'col-md-10']">
            <font-awesome-icon id="menu-bar" icon="fa-solid fa-bars" @click="$emit('hide')" />
        </div>
        <div :class="[ !hide? 'col-md-4' : 'col-md-2']">
            <font-awesome-icon icon="fa-solid fa-bell" />
            <span class="vertical-line"></span>
            <span class="name">Ganno Loic</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
            <font-awesome-icon class="icon" id="compte" icon="fa-solid fa-circle-user" />
        </div>
    </div>
</template>
<script>
export default {
    props:{
        hide:{
            type: Boolean,
            default: false
        }
    },
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
.col-md-4 .col-md-2 .col-md-10 .col-md-8{
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
</style>