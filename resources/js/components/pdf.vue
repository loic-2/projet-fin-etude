<template>
    <div class="container-flex">
        <embed :src="path_file" style="width:100%;height:100vh"  type="application/pdf">
    </div>
</template>
<script>import { store } from "../storage"

export default {
    data() {
        return {
            path_file:store.state.domain+"api/viewfile/?file="+this.$route.params.file
        }
    },
    props:{
        filename:String
    },
    methods:{
        get(){
           this.path_file=store.state.domain+this.path_file+this.filename
        }
    },
    mounted() {
    },
}
</script>
<style scoped>
div{
    overflow-y: hidden;
    margin: 0;
    padding: 0;
}
embed{
    padding: 0;
}
</style>