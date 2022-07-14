<template>
  <div class="row entire-histry" style="margin-top:100px; margin-left:50px; margin-bottom:35px">
    
    <div class="row" style="margin-bottom:25px">
        <button class="group btn btn-danger btn-block col-lg-2 col-md-3 col-sm-3 col-4" @click="toggleSuppression" style="margin-left:-35px">Suppression  
            <font-awesome-icon icon="angle-up" v-if="showSuppression" style="margin-left:25px"/>
            <font-awesome-icon icon="angle-down" v-if="!showSuppression" style="margin-left:25px"/>
        </button>
        <div class="row" v-if="showSuppression" >
            <div v-for="hist in histry" :key="hist.ID_HISTORIQUE" class="histry row" style="margin-top:20px; margin-bottom:20px; margin-right:20px">
                <span class="icon col-1" style="background-color:rgb(224, 89, 89);"><font-awesome-icon class="element" icon="trash"/></span>
                <div class="col-10" style="padding: 0 20px 0 20px">
                    <HistoriqueElement ></HistoriqueElement>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:25px">
        <button class="group btn btn-warning btn-block col-lg-2 col-md-3 col-sm-3 col-4" @click="toggleModification" style="margin-left:-35px">Modification  
            <font-awesome-icon icon="angle-up" v-if="showModification" style="margin-left:25px"/>
            <font-awesome-icon icon="angle-down" v-if="!showModification" style="margin-left:25px"/>
        </button>
        <div class="row" v-if="showModification">
            <div class="histry row" style="margin-top:20px; margin-bottom:20px; margin-right:20px">
                <span class="icon col-1" style="background-color:rgb(224, 215, 79);"><font-awesome-icon class="element" icon="pen"/></span>
                <div class="col-10 offset-1">
                    <HistoriqueElement ></HistoriqueElement>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:25px">
        <button class="group btn btn-success btn-block col-lg-2 col-md-3 col-sm-3 col-4" @click="toggleAjout" style="margin-left:-35px">Ajout  
            <font-awesome-icon icon="angle-up" v-if="showAjout" style="margin-left:25px"/>
            <font-awesome-icon icon="angle-down" v-if="!showAjout" style="margin-left:25px"/>
        </button>
        <div class="row" v-if="showAjout">
            <div class="histry row" style="margin-top:20px; margin-bottom:20px; margin-right:20px">
                <span class="icon col-1" style="background-color:rgb(67, 223, 101);"><font-awesome-icon class="element" icon="plus"/></span>
                <div class="col-10 offset-1">
                    <HistoriqueElement ></HistoriqueElement>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-bottom:25px">
        <button class="group btn btn-primary btn-block col-lg-2 col-md-3 col-sm-3 col-4" @click="toggleTelecghargement" style="margin-left:-35px">Ajout  
            <font-awesome-icon icon="angle-up" v-if="showTelechargement" style="margin-left:25px"/>
            <font-awesome-icon icon="angle-down" v-if="!showTelechargement" style="margin-left:25px"/>
        </button>
        <div class="row" v-if="showTelechargement">
            <div class="histry row" style="margin-top:20px; margin-bottom:20px; margin-right:20px">
                <span class="icon col-1" style="background-color:rgb(32, 93, 226);"><font-awesome-icon class="element" icon="download"/></span>
                <div class="col-10 offset-1">
                    <HistoriqueElement ></HistoriqueElement>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <button class="group btn btn-info btn-block col-lg-2 col-md-3 col-sm-3 col-4" @click="toggleLecture" style="margin-left:-35px">Lecture  
            <font-awesome-icon icon="angle-up" v-if="showLecture" style="margin-left:25px"/>
            <font-awesome-icon icon="angle-down" v-if="!showLecture" style="margin-left:25px"/>
        </button>
        <div class="row" v-if="showLecture">
            <div class="histry row" style="margin-top:20px; margin-bottom:20px; margin-right:20px">
                <span class="icon col-1" style="background-color:rgb(65, 191, 230);"><font-awesome-icon class="element" icon="eye"/></span>
                <div class="col-10 offset-1">
                    <HistoriqueElement ></HistoriqueElement>
                </div>
            </div>
        </div>
    </div>

  </div>
</template>

<script>
import { index } from "../api";
import { store } from "../storage";
import HistoriqueElement from "./historiqueElement.vue";
export default {
    components: { HistoriqueElement },
    data() {
        return {
            showModification:true,
            showTelechargement:true,
            showAjout:true,
            showSuppression:true,
            showLecture:true,
            histry:""
        }
    },
    methods: {
        toggleModification(){
            this.showModification=!this.showModification
        },
        toggleAjout(){
            this.showAjout=!this.showAjout
        },
        toggleSuppression(){
            this.showSuppression=!this.showSuppression
        },
        toggleTelecghargement(){
            this.showTelechargement=!this.showTelechargement
        },
        toggleLecture(){
            this.showLecture=!this.showLecture
        },
        getHistry(){
           const result= index(store.getters.getDomain+'api/historique');
            result.then(res => {
                this.histry=res.data;
            })
        }
    },
}
</script>

<style scoped>

.row[data-v-7ada4c30]{
    margin:0;
    padding:0;
}
.row{
    margin: 0;
    padding: 0;
}
.icon{
    height: 40px;
    width: 40px;
    border-radius: 50px;
    margin-left: -20px;
}
.element{
    margin-top:10px;
}
.entire-histry{
    border-left: rgb(58, 56, 56) solid 3px;
}
</style>