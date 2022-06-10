<template>
    <div class="row">
        <PopProjet @fermer="fermer" :projet="projet" :categories="categories" :encadreurs="encadreurs" :membres="membres" v-if="show"></PopProjet>
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
                <tr v-for="donnee in donnees" :key="donnee[0]" @click="goto(donnee)">
                    <td><input type="checkbox" v-model="donnee.check" name="allChecked" @change="[donnee.check? add(donnee):remove(donnee)]"></td>
                    <td v-for="colonne in colonnes" :key="colonne.key">
                        {{donnee[colonne.reference]}}
                    </td>
                    <td><button class="btn btn-primary"><font-awesome-icon icon="fas fa-pen" v-if="edit"/></button>
                        <span>&nbsp;</span><span>&nbsp;</span>
                        <button class="btn btn-danger"><font-awesome-icon icon="fas fa-trash" v-if="trash" @click="add(donnee)"/></button>
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
import { showAdmin, showProjet } from '../StrongMethode';
import PopProjet from './PopProjet.vue';
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
        fermer(){
            this.show=false;
        },
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
            console.log(this.lignesAsupprimes)
        },
        remove(val){
            if (this.lignesAsupprimes.includes(val)) {
                this.lignesAsupprimes.splice(this.lignesAsupprimes.indexOf(val),1)
                this.view()
            }
        },
        add(val){
            if (!this.lignesAsupprimes.includes(val)) {
                this.lignesAsupprimes.push(val)
                this.view()
            }
        },
        addAll(val){
            val.forEach(element => {
                element.check=true
                this.add(element)
            });
        },
        removeAll(val){
            val.forEach(element => {
                element.check=false
                this.remove(element)
            });
        },
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