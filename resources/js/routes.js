
import Memoire from './components/Memoire'
import Pfe from './components/Pfe'
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
            component: Memoire
        },
        {
            path:'/dashboard',
            component: Board,
        },
        {
            path:'/pfe',
            component: Pfe
        },
        {
            path:'/admin',
            component: Admin
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
            path:'*',
            component: NotFound
        }
    ]
}