<template>
    <div class="container-flex">
        <div class="row justify-content-center">
                <div class="card p-0">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example 2 component.
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
.card{
    margin-top: 60px;
}
.row{
    margin: 0;
}
</style>
