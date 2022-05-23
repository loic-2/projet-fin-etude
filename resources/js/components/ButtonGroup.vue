<template>
    <div class="row" style="margin:20px 0 20px 0">
        <div class="col text-center">
            <button-custom :button="button" v-for="button in buttons" :key="button.id" style="margin:0 15px 0 15px"></button-custom>
        </div>
    </div>
</template>

<script>
import ButtonCustom from "./ButtonCustom.vue"
export default {
    components:{
        'button-custom':ButtonCustom
    },
    props:{
        buttons:Array
    }
}
</script>