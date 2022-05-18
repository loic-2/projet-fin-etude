
import Memoire from './components/Memoire'
import Pfe from './components/Pfe'
import Board from './components/Board'
import StatCard from './components/StatCard'

export default{
    
    mode: 'history',
    routes: [
        {
            path:'/memoire',
            component: Memoire
        },
        {
            path:'/dashboard',
            component: Board
        },
        {
            path:'/pfe',
            component: Pfe
        },
        {
            path:'/card',
            component: StatCard
        }
    ]
}