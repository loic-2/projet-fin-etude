<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component {{message}}</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                    <Button class="show" @click="showAlert">Click</Button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import StatCard from './StatCard.vue';
    export default {
        data() {
            return {
                message: "Bonjour le monde"
            }
    },
        components:{
    StatCard
},
        methods: {
    showAlert() {
      // Use sweetalert2
      this.$swal('Hello Vue world!!!');
    },
  },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
