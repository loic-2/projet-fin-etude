import { removeProjet, store } from "./storage";
import { stocker, storage } from "./api";

let projet_id=null
let membre_id=[]
let encadreur_id=[]

export function createProjet(){
    
    const res = storage('http://localhost:8000/api/projet',store.getters.getProjet)
    res.then(res => {console.log(res)
        projet_id=res.data.id
        if (projet_id !=null) {
            savaData()
        }
    })
        .catch(err => {console.log(err)});
}

function savaData(){

    store.getters.getEncadreur.forEach(encadreur => {
        const res = stocker('http://localhost:8000/api/encadreur',encadreur)
        res.then(res => {encadreur_id.push(res.data.id)})
        .catch(err => {console.log(err)})
    });
    store.getters.getMembre.forEach(membre => {
        membre['ID_PROJET']=projet_id
        const res= stocker('http://localhost:8000/api/membre',membre)
        res.then(res => {membre_id.push(res.data.id)
        console.log(membre_id)})
        .catch(err => { console.log(err)})
    });
    store.getters.getCategorieSelected.forEach(categorie => {
        categorie['ID_PROJET']=projet_id
        const res = stocker('http://localhost:8000/api/categorie_projet',categorie)
        res.then(res => {return res.data})
        .catch(err => {return err})
    })

    membre_id=[]
    projet_id=[]
    encadreur_id=[]
    removeProjet()
}