<template>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" name="allChecked" v-model="coche"  id="allChecked" @change="[coche? addAll(donnees):removeAll(donnees)]"></th>
                    <th v-for="colonne in colonnes" :key="colonne.key">
                        {{colonne.nom}}
                        <font-awesome-icon icon="fas-solid fa-sort" v-if="colonne.sortable" @click="sortBy(colonne.reference)"/>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="donnee in donnees" :key="donnee[0]" @click="goto(donnee[0])">
                    <td><input type="checkbox" v-model="donnee.check" name="allChecked" @change="[donnee.check? add(donnee):remove(donnee)]"></td>
                    <td v-for="colonne in colonnes" :key="colonne.key">
                        {{donnee[colonne.reference]}}
                    </td>
                    <td><font-awesome-icon icon="fas fa-pen" v-if="edit"/><span>&nbsp;</span><span>&nbsp;</span><font-awesome-icon icon="fas fa-trash" v-if="trash" @click="add(donnee)"/></td>
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
export default {
    components:{
        VueAdsPageButton,
        VueAdsPagination
    },
    data(){
        return{
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
        goto(val){
          console.log(val)  
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
    border-radius: 20px 20px 0 0;
    border-collapse: collapse;
}
table tr td{
    background-color: #ffffff;
}
table tr th{
    text-transform: capitalize;
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