<template>
    <div class="container-flex position-fixed top-bar row mx-0 px-0 py-2">
        <div class="col-md-8">
            <font-awesome-icon id="menu-bar" icon="fa-solid fa-bars" @click="$emit('hide')" />
        </div>
        <div class="col-md-4 ">
            <font-awesome-icon icon="fa-solid fa-bell" />
            <span class="vertical-line"></span>
            <span class="name">Ganno Loic</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span>
            <font-awesome-icon class="icon" icon="fa-solid fa-circle-user" />
        </div>
    </div>
</template>
<script>
export default {
    
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
    margin-right: 50px;
    height: 40px;
}
.col-md-4 .col-md-8{
    padding: 0;
}
#menu-bar{
    cursor: pointer;
}
</style>