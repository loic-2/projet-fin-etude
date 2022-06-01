import Vue from 'vue'
import Vuex from 'vuex'
import {index} from './api'
Vue.use(Vuex)

export const store= new Vuex.Store({
  state:{
    barName:"Tableau de bord",
    admin:[],
    projet:[],
    select:[],
    encadreur:[],
    membre:[],

    filieresPfe:[{value:"ITT3-IR-CLA",id:1},{value:"ITT3-IR-ALT",id:2},{value:"ITT3-RC-CLA",id:3},
    {value:"ITT3-RC-ALT",id:4},{value:"ITT3-RT-CLA",id:5},{value:"ITT3-RT-ALT",id:6}],
    promotionPfe:[
      {
          value:"2017 - 2020",
          id:1
      },
      {
          value:"2018 - 2021",
          id:2,
      }
      ,
      {
          value:"2019 - 2022",
          id:3,
      }
  ],

    filiereMemoire:[{value:"IT2",id:1},{value:"M2",id:2}],
    promotionMemoire:[
      {
          value:"2017 - 2019",
          id:1
      },
      {
          value:"2018 - 2020",
          id:2,
      }
      ,
      {
          value:"2019 - 2021",
          id:3,
      }
  ],

    categorie:[],
    categorieSelected:[]
  },
  mutations:{
    changeBarName(state,name){
      state.barName=name
    },
    addProjet(state,{name,link,type,promotion}){
        state.projet.push({
            NOM_PROJET:name,
            TYPE_PROJET:type,
            LIEN_FICHIER_PROJET:link,
            PROMOTION_PROJET:promotion
        })
    },
    addAdmin(state,{name,email,telephone,login,mdp}){
      state.admin.push({
        NOM_ADMINISTRATEUR:name,
        LOGIN_ADMINISTRATEUR:login,
        MOT_DE_PASSE_ADMINISTRATEUR:mdp,
        EMAIL_ADMINISTRATEUR:email,
        TELEPHONE_ADMINISTRATEUR:telephone,
      })
    },
    addEncadreur(state,{name,profession,type,telephone}){
        state.encadreur.push({
            NOM_ENCADREUR:name,
            PROFESSION_ENCADREUR:profession,
            TELEPHONE_ENCADREUR:telephone,
            TYPE_ENCADREUR:type
        })
    },
    addMembre(state,{name,matricule,telephone,filiere}){
        state.membre.push({
            NOM_MEMBRE:name,
            MATRICULE_MEMBRE:matricule,
            TELEPHONE_MEMBRE:telephone,
            FILIERE_MEMBRE:filiere
        })
    },
    addSelect(state,{value,cle}){
      state.select[cle]=value
    },
    addCategorieSelected(state,{value}){
      if (!(state.categorieSelected.includes(value))) {
        state.categorieSelected.push(value)
      }
    },
    addCategorie(state,{value}){
      state.categorie.push(value)
    }
  },
  getters:{
    getSelect(state){
      return state.select
    },
    getBarName(state){
      return state.barName
    },
    getAdmin(state){
      return state.admin
    },
    getMembre(state){
      return state.membre
    },
    getProjet(state){
      return state.projet
    },
    getEncadreur(state){
      return state.encadreur
    },
    getCategorie(state){
      return state.categorie
    },
    getCategorieSelected(state){
      return state.categorieSelected
    },
    getFilieresPfe(state){
      return state.filieresPfe
    },
    getFilieresMemoire(state){
      return state.filiereMemoire
    },
    getPromotionMemoire(state){
      return state.promotionMemoire
    },
    getPromotionPfe(state){
      return state.promotionPfe
    }
  }
})
export function storeCategorieSelected(val){
  store.commit('addCategorieSelected',{value:val})
}
export function storeSelect(key,val){
  store.commit('addSelect',{value:val,cle:key})
}

export function storeStudent(tab=Array)
{
    for (let index = 0; index < tab.length; index++) {
      let indice=`etudiant${index+1}`
        if (tab[index][0].valeur !="") {
            store.commit('addMembre',{
                name:tab[index][0].valeur,
                matricule:tab[index][1].valeur,
                telephone:tab[index][2].valeur,
                filiere:store.state.select[indice]
            })
        }
        
    }
}

function getCategorieData(){
  const promise= index("http://localhost:8000/api/categorie")
  promise.then((res)=>{
    res.data.forEach(objet => {
      store.commit('addCategorie',{value:objet.NOM_CATEGORIE})
    });
  })
}

export function storeProjet(tab=Array)
{
    store.commit('addProjet',{
        name:tab.title,
        promotion:tab.promotion,
        link:tab.lien,
        type:tab.type
    })
}

export function storeEncadreur(tab=Array)
{
    for (let i = 0; i<=tab.length; i++) {
      let indice=`encadreur${i+1}`
        store.commit('addEncadreur',{
            name:tab[i][0].valeur,
            profession:[i][1].valeur,
            telephone:tab[i][2].valeur,
            type:store.state.select[indice],
        })
    }
}

export function storeAdmin(tab=Array)
{
    store.commit('addAdmin',{
        name:tab[0],
        email:tab[1],
        telephone:tab[2],
        login:tab[3],
        mdp:tab[4]
    })
}
getCategorieData()
global.store=store
storeAdmin(['Ganno Loic','loicganno@gmail.com',"655084085","loic","sdnjhgtyui"])
console.log(store.getters.getAdmin)