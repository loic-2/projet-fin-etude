<template>
  <div class="row message">
    <div class="row header" style="padding:10px">
        <div class="col">
            <span class="nom" style="">Nom de la personne</span>
        </div>
        <div class="col-lg-1 col-md-2 col-sm-2 col-xm-4 align-text-end" style="color: #918c8c">
            <font-awesome-icon icon="clock"/> 22:00
        </div>
    </div>
    <div class="body">
        <div class="row content">
            <div class="col" style="padding:10px">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus vel molestiae quod.
                </p>
            </div>
        </div>
    </div>
    <div class="row footer">
        <div class="col" style="padding:10px;">
            <button class="btn btn-danger"><font-awesome-icon icon="close"/> Supprimer</button>
        </div>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.row, .row[data-v-332fccf4]{
    margin: 0;
    padding: 0;
}
.col, .col-lg-1, .col-md-2, .col-sm-2, .col-xm-4{
    padding: 0;
}
.message{
    background-color: #fff;
    border-radius: 17px;
}
.body{
    border: #383636 solid 1px;
    border-left: 0px;
    border-right: 0px;
    border-bottom: 0px;
}
</style>