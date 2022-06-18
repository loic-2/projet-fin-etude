<template>
        <div class="container-flex box" style="background-image: url('/storage/img/background2.png');width:100%;
    background-size:cover">
            <div class=" row align-flex-center">
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
                            <div class="col text-end">
                                <span @click="forgotPassword">Mot de passe oublie?</span>
                            </div>
                        </div>
                        <div class="row mb-3 text-center">
                            <input @click="login" type="submit" class="btn offset-4 col-4 btn-primary" value="Se connecter">
                        </div>
                </div>
            </div>
        </div>
</template>
<script>
import { show, stocker } from "../api"
import { store, setUsername } from '../storage'

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
        forgotPassword(){
            window.location.href='/forgot-password';
        },
        login(){
            console.log(this.donnee)
            stocker('http://localhost:8000/login',this.donnee)
            .then(res => {
                setUsername(res.data.user_details.name);
                console.log(res.data.user_details)
                store.state.user={
                    ID_ADMINISTRATEUR:res.data.user_details.id,
                    NOM_ADMINISTRATEUR:res.data.user_details.NOM_ADMINISTRATEUR,
                    LOGIN_ADMINISTRATEUR:res.data.user_details.name,
                    EMAIL_ADMINISTRATEUR:res.data.user_details.email,
                    TELEPHONE_ADMINISTRATEUR:res.data.user_details.TELEPHONE_ADMINISTRATEUR,
                    }
                this.$emit('authenticate')
                })
            .catch(err => {
                console.log(err)
                this.error_message=err.response.data.message;
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
.box{
    background-color: rgba(202, 196, 194, 0.6);
    height: 100vh;
    width: 100%;
}
.form{
    position: fixed;
    background-color: #ffffff;
    border-radius: 15px;
    width: 40%;
    left: 30%;
    top:25%;
}
span{
    cursor: pointer;
}
</style>