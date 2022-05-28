

import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import App from './components/App'
import { library } from '@fortawesome/fontawesome-svg-core'

import { BootstrapVue, } from 'bootstrap-vue'
// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
/* import specific icons */
import { faDashboard,faSort,faUserPlus,faPlus,faTrash,faUserTimes,faPen,faSave,faUndo,faTimes,faArrowAltCircleLeft,faSearch,
  faFilter,faCheck,faPlusCircle,faEye,faEyeSlash,faBars,faBookBookmark,faUserTie,faGear,faMagnifyingGlass,faBell,faClockRotateLeft,faCircleUser } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Vuex from 'vuex'


library.add(faUserPlus,faSort,faPlus,faTrash,faUserTimes,faPen,faSave,faUndo,faTimes,faArrowAltCircleLeft,
  faFilter,faPlusCircle,faCheck,faEye,faEyeSlash,faSearch,faDashboard,faBars,faBookBookmark,faUserTie,faGear,faBell,faMagnifyingGlass,faClockRotateLeft,faCircleUser)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(VueRouter)
Vue.use(VueSweetalert2)
Vue.use(Vuex)

export const store= new Vuex.Store({
  state:{
    barName:"Tableau de bord",
    addAdmin:[],
    addProjet:{
      NOM_PROJET:"",
      TYPE_PROJET:"",
      PROMOTION_PROJET:"",
      LIEN_FICHIER_PROJET:"",
    },
    addEncadreur:{
      NOM_ENCADREUR:"",
      PROFESSION_ENCADREUR:"",
      TELEPHONE_ENCADREUR:"",
    },
    addMembre:{
      NOM_MEMBRE:"",
      FILIERE_MEMBRE:"",
      TELEPHONE_MEMBRE:""
    }
  },
  mutations:{
    changeBarName(state,name){
      state.barName=name
    },
    addAdminName(state,{name,email,telephone,login,mdp}){
      state.addAdmin.push({
        NOM_ADMINISTRATEUR:name,
        LOGIN_ADMINISTRATEUR:login,
        MOT_DE_PASSE_ADMINISTRATEUR:mdp,
        EMAIL_ADMINISTRATEUR:email,
        TELEPHONE_ADMINISTRATEUR:telephone,
      })
    }
  },
  getters:{
    getBarName(state){
      return state.barName
    },
    getAdmin(state){
      return state.addAdmin
    },
    getMembre(state){
      return state.addMembre
    },
    getProjet(state){
      return state.addProjet
    },
    getEncadreur(state){
      return state.addEncadreur
    }
  }
})

let app = new Vue({
    el: '#app',
    components:{
      'app': App,
      'font-awesome-icon':FontAwesomeIcon
    },
    methods: {
        showAlert() {
          // Use sweetalert2
          this.$swal('Hello Vue world!!!');
        },
      },
    router: new VueRouter(routes)
});
global.store= store
store.commit('addAdminName',{
  name:'Ganno Loic',
  email:'loicganno@gmail.com',
  telephone:"655084085",
  login:"loic",
  mdp:"sdnjhgtyui"})
console.log(store.getters.getAdmin);