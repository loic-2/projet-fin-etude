import { removeProjet, store } from "./storage";
import { stocker, storage } from "./api";
import Swal from 'sweetalert2'

let projet_id=null
let encadreur_id=[]

function succes(msg=String){
    Swal.fire({
        title:'Succes',
        text:msg,
        icon:'success',
        confirmButtonText:'Fermer',
    })
}
function error(msg=String){
    Swal.fire({
        title:'Erreur',
        text:msg,
        icon:'error',
        confirmButtonText:'Fermer'
    })
}

export async function createProjet(){
    
    const res = storage('http://localhost:8000/api/projet',store.getters.getProjet)
    res.then(res => {console.log(res);
        projet_id=res.data.id;
        if (projet_id !=null) {
            saveData();
        }
        })
        .catch(err => {
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        });
        
}

async function saveData(){
    await store.getters.getEncadreur.forEach(encadreur => {
        const res = stocker('http://localhost:8000/api/encadreur',encadreur)
        res.then(res => {encadreur_id[encadreur_id.length]=res.data.id})
        .catch(err => {
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        })
    });
    await store.getters.getMembre.forEach(membre => {
        membre['ID_PROJET']=projet_id
        const res= stocker('http://localhost:8000/api/membre',membre)
        res.then(res => {
            let id= res.data.id;
            for (let index = 0; index < encadreur_id.length; index++) {
                const element = encadreur_id[index];
                const res1 = stocker('http://localhost:8000/api/encadrement',{
                    ID_PROJET:projet_id,
                    ID_ENCADREUR: element,
                    ID_MEMBRE: id
                })
                .then(res => {
                    succes('Projet Bien enregistre');
                    encadreur_id=[];
                    projet_id=null;
                    removeProjet();
                })
                .catch(err => {
                    error('Impossible de contacter le serveur, veillez reesayer plustard')
                })
            }
        })
        .catch(err => { 
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        })
    });
    await store.getters.getCategorieSelected.forEach(categorie => {
        categorie['ID_PROJET']=projet_id
        const res = stocker('http://localhost:8000/api/categorie_projet',categorie)
        res.then(res => {console.log(res.data)})
        .catch(err => {
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        })
    });
}