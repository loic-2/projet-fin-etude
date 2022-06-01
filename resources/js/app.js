

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


library.add(faUserPlus,faSort,faPlus,faTrash,faUserTimes,faPen,faSave,faUndo,faTimes,faArrowAltCircleLeft,
  faFilter,faPlusCircle,faCheck,faEye,faEyeSlash,faSearch,faDashboard,faBars,faBookBookmark,faUserTie,faGear,faBell,faMagnifyingGlass,faClockRotateLeft,faCircleUser)
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.use(VueRouter)
Vue.use(VueSweetalert2)


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