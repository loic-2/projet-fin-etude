
import Memoire from './components/Memoire'
import Pfe from './components/Pfe'
import pdf from './components/pdf'
import NotFound from './components/NotFound'
import Board from './components/Board'
import Admin from './components/Admin'
import AjoutMemoire from './components/AjoutMemoire'
import AjoutPfe from './components/AjoutPfe'
import AjoutAdmin from './components/AjoutAdmin'

export default{
    
    mode: 'history',
    routes: [
        {
            path:'/memoire',
            component: Memoire,
            name:'memoires'
        },
        {
            path:'/dashboard',
            component: Board,
        },
        {
            path:'/pfe',
            component: Pfe,
            name:'projet de fin d\'etude'
        },
        {
            path:'/admin',
            component: Admin,
            name:'administrateurs'
        },
        {
            path:'/ajoutpfe',
            component: AjoutPfe
        },
        {
            path:'/ajoutmemoire',
            component: AjoutMemoire
        },
        {
            path:'/ajoutadmin',
            component: AjoutAdmin
        },
        {
            path:'/lire',
            component: pdf,
            name:'document'
        },
        {
            path:'*',
            component: NotFound
        }
    ]
}