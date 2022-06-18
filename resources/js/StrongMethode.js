import { removeProjet, store } from "./storage";
import { lockout, show, stocker, storage,ElementDrop } from "./api";
import Swal from 'sweetalert2'
import 'sweetalert2/src/sweetalert2.js'

let projet_id=null
let encadreur_id=[]

function succes(msg=String){
    Swal.fire({
        title:'Succes',
        allowOutsideClick:false,
        text:msg,
        icon:'success',
        confirmButtonText:'Fermer',
    })
}
function error(msg=String){
    Swal.fire({
        title:'Erreur',
        allowOutsideClick:false,
        text:msg,
        icon:'error',
        confirmButtonText:'Fermer'
    })
}

export async function createProjet(){
    
    const res = storage(`http://localhost:8000/api/projet?membres=${store.getters.getMembre}
    &encadreurs=${store.getters.getEncadreur}&categories=${store.getters.getCategorieSelected}`,store.getters.getProjet)
    res.then(res => {console.log(res.data.id);
        projet_id=res.data.id;
        if (projet_id !=null) {
            saveData();
        }else{
            error(res.data.echec)
        }
        })
        .catch(err => {
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        });
        
}

async function saveData(){
    await store.getters.getEncadreur.forEach(encadreur => {
        const res = stocker('http://localhost:8000/api/encadreur',encadreur)
        res.then(res => {
            const res1 = stocker('http://localhost:8000/api/encadrement',{
                    ID_PROJET:projet_id,
                    ID_ENCADREUR: res.data.id,
                })
            res1.then(res => {
                removeProjet();
            })
            .catch(err => {
                error('Impossible de contacter le serveur, veillez reesayer plustard')
            })
        })
        .catch(err => {
            error('Impossible de contacter le serveur, veillez reesayer plustard')
        })
    });
    await store.getters.getMembre.forEach(membre => {
        membre['ID_PROJET']=projet_id
        const res= stocker('http://localhost:8000/api/membre',membre)
        res.then(res => {
            let id= res.data.id;
            console.log(id)
            succes('Projet Bien enregistre');
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

export async function registerAdmin(data){
    const res = stocker('http://localhost:8000/register',data);
    res.then(res => {
        console.log(res.data);
        Swal.fire({
            icon:'success',
            title:'Succes',
            text:'Succes de l\'enregistrement'
        })
    }).catch(err => {
        Swal.fire({
            icon:'error',
            title:'Erreur',
            text:'Echec de l\'enregistrement'
        })
        console.log(err)
    })
}

export async function logout(){
    const res = lockout('http://localhost:8000/logout');
    res.then(res => {
        console.log(res);
    }).catch(err => {
        console.log(err);
    })
}

export function showAdmin(admin=Object){
    let id= admin.ID_ADMINISTRATEUR;
    Swal.fire({
        iconHtml:'<i class="fa-solid fa-user-tie"></i>',
        html:'<h6>'+admin.NOM_ADMINISTRATEUR+'</h6><div style="padding: 0 0 0 135px" class="container text-start">'+
                '<p>'+'<i class="fa-solid fa-phone"></i><span>&nbsp;</span>'+admin.TELEPHONE_ADMINISTRATEUR+'</p>'+
                '<p>'+'<i class="fa-solid fa-envelope"></i><span>&nbsp;</span>'+admin.EMAIL_ADMINISTRATEUR+'</p>'+
                '<p>'+'<i class="fa-solid fa-user"></i><span>&nbsp;</span>'+admin.LOGIN_ADMINISTRATEUR+'</p>'+
            '</div>',
        allowOutsideClick:false,
        confirmButtonText:'Modifier',
        cancelButtonText:'Fermer',
        denyButtonText:'Supprimer',
        showCancelButton:true,
        showDenyButton:true,
        showClass:{
            popup: 'swal2-show',
            backdrop: 'swal2-backdrop-show',
            icon: 'swal2-icon-show'
          }
    })
}

export function showMembre(membre=Object){
    Swal.fire({

        iconHtml:'<i class="fa-solid fa-graduation-cap"></i>',
        html:'<h6>'+membre.NOM_MEMBRE+'</h6><div style="padding: 0 0 0 135px" class="container text-start">'+
                '<p>'+'<i class="fa-solid fa-phone"></i><span>&nbsp;</span>'+membre.TELEPHONE_MEMBRE+'</p>'+
                '<p>'+'<i class="fa-solid fa-school"></i><span>&nbsp;</span>'+membre.FILIERE_MEMBRE+'</p>'+
            '</div>',
        showCancelButton:true,
        showDenyButton:true,
        confirmButtonText:'Modifier',
        denyButtonText:'Supprimer',
        cancelButtonText:'Fermer',
    })
}

export function showEncadreur(encadreur=Object){
    Swal.fire({
        iconHtml:'<i class="fa-solid fa-user-tie"></i>',
        html:'<h6>'+encadreur.NOM_ENCADREUR+'</h6><div style="padding: 0 0 0 135px" class="container text-start">'+
                '<p>'+'<i class="fa-solid fa-phone"></i><span>&nbsp;</span>'+encadreur.TELEPHONE_ENCADREUR+'</p>'+
                '<p>'+'<i class="fa-solid fa-user-helmet-safety"></i><span>&nbsp;</span>'+encadreur.PROFESSION_ENCADREUR+'</p>'+
            '</div>',
        showCancelButton:true,
        showDenyButton:true,
        confirmButtonText:'Modifier',
        denyButtonText:'Supprimer',
        cancelButtonText:'Fermer',
    })
}

export async function showProjet(projet=Object){
    let id= projet.ID_PROJET;
    console.log(id)
    const res =show(`http://localhost:8000/api/lien/${id}`)
    try {
        return await res;
    } catch (err) {
        console.log(err);
    }
}

export async function deleteProjet(projets=Array){
    projets.forEach(projet => {
       const res= ElementDrop('http://localhost:8000/api/projet/'+projet.ID_PROJET)
       res.then(res => {
            Swal.fire({
                icon:'success',
                title:'Projet supprimer avec succes'
            });
       })
    });
}

export function verifyToDelete(val) {
    if (store.state.suppressList!=0) {
        Swal.fire({
            icon:'question',
            title:`Voulez-vous vraimment supprimmez ce${store.state.suppressList>1? 's ':' '}`+
            store.state.suppressList.length+' '+val.currentRoute.name+
            `${store.state.suppressList>1? 's':''}`,
            confirmButtonText:'Non',
            denyButtonText:'Oui',
            showDenyButton:true
        }).then(res => {
            if (res.isDenied) {
                switch (val.currentRoute.path) {
                    case '/admin':
                        break;

                    case '/pfe':
                        deleteProjet(store.state.suppressList)
                        break;

                    case '/memoire':
                        deleteProjet(store.state.suppressList)
                        break;

                    default:
                        break;
                }
            }
            store.state.suppressList=[];
            return true;
        })
    } else {
        Swal.fire({
            icon:'info',
            title:'Oups!!',
            text:'Vous n\'avez selectionner aucun element' 
        })
    }
}
