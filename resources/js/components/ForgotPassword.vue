<template>
    <div class="cantainer-flex box">
        <div class="form row">
            <div class="my-2 ">
                <label for="" class="form-label">Email</label>
                <input type="email" placeholder="Entrer votre email" checked :class="{'is-invalid':test}" class="form-control" v-model="email">
                <div class="invalid-feedback">
                    {{error_message}}
                </div>
            </div>
            <div class="row mb-3 text-center">
                <input @click="sendLink" type="submit" class="btn offset-4 col-4 btn-primary" value="envoyer">
            </div>
        </div>
    </div>
</template>
<script>import { stocker } from "../api"

export default {
    data(){
        return{
            email:'',
            test:false,
            error_message:''
        }
    },
    methods:{
        sendLink(){
            const res = stocker('http://localhost:8000/forgot-password',{
                'email':this.email
                })
            res.then(res => {
                console.log(res.data);
            }).catch(err => {
                this.test=true
                this.error_message=err.response.data.errors.email[0]
            })
        }
    }
}
</script>
<style scoped>
.box{
    background-color: rgba(202, 196, 194, 0.6);
    height: 100vh;
    width: 100%;
}
.form{
    position: fixed;
    background-color: #ffffff;
    border-radius: 15px;
    top: 35vh;
    width: 50%;
    left: 25%;
}
</style>