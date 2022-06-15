<template>
    <div class="cantainer-flex box">
        <div class="form row">
            <div class="mb-2 mt-3">
                <label for="" class="form-label">Email</label>
                <input type="email" placeholder="Entrer votre email" :class="{'is-invalid':test}" class="form-control" v-model="email">
                <div class="invalid-feedback">
                    {{error_message}}
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Mot de passe</label>
                <input type="email" placeholder="Entrer votre nouveau mot de passe" :class="{'is-invalid':test}" class="form-control" v-model="password">
                <div class="invalid-feedback">
                    {{error_message}}
                </div>
            </div>
            <div class="mb-2">
                <label for="" class="form-label">Confirmer le mot de passe</label>
                <input type="email" placeholder="Confirmer votre nouveau mot de passe" :class="{'is-invalid':test}" class="form-control" v-model="password_confirmation">
                <div class="invalid-feedback">
                    {{error_message}}
                </div>
            </div>
            <div class="row mt-3 mb-3 text-center">
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
            password:'',
            password_confirmation:'',
            test:false,
            error_message:''
        }
    },
    methods:{
        sendLink(){
            const res = stocker('http://localhost:8000/reset-password',{
                'email':this.email,
                'password':this.password,
                'password_confirmation':this.password_confirmation,
                'token':this.$route.query.token,
                })
            res.then(res => {
                console.log(res.data);
            }).catch(err => {
                console.log(err)
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
    top: 25vh;
    width: 50%;
    left: 25%;
}
</style>