<template>
    <div class="row">
        <PopProjet @fermer="fermer" @actualise="actualise" :projet="projet" :categories="categories" :encadreurs="encadreurs" :membres="membres" v-if="show"></PopProjet>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" name="allChecked" v-model="coche"  id="allChecked" @change="[coche? addAll(donnees):removeAll(donnees)]"></th>
                    <th class="col" v-for="colonne in colonnes" :key="colonne.key">
                        {{colonne.nom}}
                        <font-awesome-icon icon="fas-solid fa-sort" v-if="colonne.sortable" @click="sortBy(colonne.reference)"/>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="donnee in donnees" :key="donnee[0]">
                    <td><input type="checkbox" v-model="donnee.check" name="allChecked" @change="[donnee.check? add(donnee):remove(donnee)]"></td>
                    <td v-for="colonne in colonnes" :key="colonne.key">
                        {{donnee[colonne.reference]}}
                    </td>
                    <td><button class="btn btn-primary" @click="goto(donnee)"><font-awesome-icon icon="fas fa-pen" v-if="edit"/></button>
                        <span>&nbsp;</span><span>&nbsp;</span>
                        <button class="btn btn-danger" @click="deleteItem(donnee)"><font-awesome-icon icon="fas fa-trash" v-if="trash"/></button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <span>Montre {{donnees.length}}</span>
        </div>
    </div>
</template>
<script>
import VueAdsPagination, { VueAdsPageButton } from 'vue-ads-pagination';
import { showAdmin, showProjet, deleteProjet, deleteAdmin } from '../StrongMethode';
import PopProjet from './PopProjet.vue';
import { store } from '../storage';
export default {
    components:{
    VueAdsPageButton,
    VueAdsPagination,
    PopProjet,
},
    data(){
        return{
            show:false,
            membres:Array,
            encadreurs:Array,
            categories:Array,
            projet:[],
            route:null,
            coche:false,
            lignesAsupprimes:[],
            sort:true
        }
    },
    props:{
        colonnes:Array,
        trash:Boolean,
        edit:Boolean,
        donnees:Array,
    },
    methods:{
        /**
         * fermer le popup
         */
        fermer(){
            this.show=false;
        },
        /**
         * permet d'afficher le popup
         */
        showPop(val){
            const res=showProjet(val)
                  res.then(res => {
                    this.show=true;
                    this.membres=res.data.membres;
                    this.encadreurs=res.data.encadreurs;
                    this.categories=res.data.categories;
                    this.projet=val;
                    console.log(res.data)
                  })
        },
        /**
         * Affiche un boite de dialogue presentant l'element ainsi que les differents actions possibles
         */
        goto(val){
          switch (this.$router.currentRoute.path) {
              case '/admin':
                  showAdmin(val)
                  break;

              case '/pfe':
                  this.showPop(val)
                  break;

              case '/memoire':
                  this.showPop(val)
                  break;

              default:
                  break;
          } 
        },
        view(){
            console.log(store.state.suppressList)
        },
        /**
         * Retire l'element selectionner de la liste des elements asupprimer
         */
        remove(val){
            if (store.state.suppressList.includes(val)) {
                store.state.suppressList.splice(this.lignesAsupprimes.indexOf(val),1)
                this.view()
            }
        },
        /**
         * Permet de supprimer un element de la table
         */
        deleteItem(val){

                this.$swal.fire({
                    icon:'question',
                    title:`Voulez-vous vraimment supprimmez ce `+this.$router.currentRoute.name,
                    confirmButtonText:'Non',
                    denyButtonText:'Oui',
                    showDenyButton:true
                }).then(res => {
                    if (res.isDenied) {
                        switch (this.$router.currentRoute.path) {
                            case '/admin':
                                console.log(val)
                                deleteAdmin([val])
                                break;

                            case '/pfe':
                                deleteProjet([val])
                                break;

                            case '/memoire':
                                deleteProjet([val])
                                break;

                            default:
                                this.actualise()
                                break;
                        }
                    }
                })
        },
        actualise(){
            this.$emit('actualise')
        },
        /**
         * Permet d'ajouter un element a la liste des elements a supprimer
         */
        add(val){
            if (!store.state.suppressList.includes(val)) {
                store.state.suppressList.push(val)
                this.view()
            }
        },
        /**
         * Ajoute tous les elements a la liste des elements a supprimmer
         */
        addAll(val){
            val.forEach(element => {
                element.check=true
                this.add(element)
            });
        },
        /**
         * retirer tous les elements de la suppress list
         */
        removeAll(val){
            val.forEach(element => {
                element.check=false
                this.remove(element)
            });
        },
        /**
         * Fait le tri suivant la colonne ou elle a ete cliquer
         */
        sortBy(val){
            if (this.sort) {
                this.donnees.sort(function(a,b){
                    if (a[val] > b[val]) {
                        return 1
                    } else {
                        return -1
                    }
                })
                this.sort = !this.sort
            } else {
                this.donnees.sort(function(a,b){
                    if (a[val] < b[val]) {
                        return 1
                    } else {
                        return -1
                    }
                })
                this.sort = !this.sort
            }
            console.log(this.donnees)
        }
    },
}
</script>

<style scoped>
.row{
    margin: 0;
}
table thead{
    background-color: rgba(54, 55, 64, .7);
    color: #363740;
}
table{
    margin: 0;
    width: 100%;
    border-radius: 20px 20px 0 0;
    border-collapse: collapse;
}
table tr td{
    background-color: #ffffff;
}
table tr th{
    text-transform: capitalize;
    width:10%;
}
table tbody tr td:last-child{
    text-align: center;
}

table thead tr th:last-child{
    text-align: center;
}

th:first-child{
    border-top-left-radius: 20px;
}
th:last-child{
    border-top-right-radius: 20px;
}
.pagination{
    background-color: #ffffff;
    border-radius: 0 0 20px 20px;
    padding: 10px;
}

table input[type="checkbox"]:after{
    background-color: #ffffff;
    outline-color: #363740;
}
</style>