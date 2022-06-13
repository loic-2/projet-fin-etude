<template>
        <div class="login row align-flex-center">
            <div class="form" id="form">
                <div class="row mt-2 mb-3 text-center">
                    <h4>Connectez-vous</h4>
                </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Login</label>
                        <input type="text" :class="{'is-invalid':test}" class="form-control" v-model="donnee.email">
                        <div class="invalid-feedback">
                            {{error_message}}
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Mot de passe </label>
                        <input type="password" :class="{'is-invalid':test}" class="form-control" v-model="donnee.password">
                        <div class="invalid-feedback">
                            {{error_message}}
                        </div>
                    </div>
                    <div class="row mb-2 option">
                        <div class="form-check col form-switch">
                            <input class="form-check-input" v-model="donnee.remember" type="checkbox">
                            <label for="">Se souvenir de moi</label>
                        </div>
                        <div class="col">
                            <a href="#">Mot de passe oublie?</a>
                        </div>
                    </div>
                    <div class="row mb-3 text-center">
                        <input @click="login" type="submit" class="btn offset-4 col-4 btn-primary" value="Se connecter">
                    </div>
            </div>
        </div>
</template>
<script>import { show, stocker } from "../api"
import { setUsername } from '../storage'

export default {
    data(){
        return{
            test:false,
            error_message:null,
            donnee:{
                    email:'',
                    password:'',
                    remember:false
                },

        }
    },
    methods:{
        login(){
            console.log(this.donnee)
            stocker('http://localhost:8000/login',this.donnee)
            .then(res => {
                setUsername(res.data.user_details.name);
                this.$emit('authenticate')
                })
            .catch(err => {
                console.log(err)
                this.error_message="Identifiants incorrects";
                this.test=true;
                });
        }
    }
}
</script>
<style scoped>
.row{
    margin: 0;
}
.login{
    margin: 0;
    padding: 10% 30% 0 30%;
    background-color: rgba(202, 196, 194, 0.6);
    width: 100%;
}
.form{
    background-color: #ffffff;
    border-radius: 15px;
    margin: 20px;
}

</style>