
import Page1 from './components/Memoire'
import Page2 from './components/Pfe'

export default{
    
    mode: 'history',
    routes: [
        {
            path:'/page1',
            component: Memoire
        },
        {
            path:'/page2',
            component: Pfe
        }
    ]
}