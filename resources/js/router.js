import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import AdvancedSearch from './pages/AdvancedSearch';
import Apartment from './pages/Apartment';
import ChiSiamo from './pages/ChiSiamo';
import Messaggistica from './pages/Messaggistica';
import Funzionalita from './pages/Funzionalita';
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: "history", 
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/advancedsearch',
            name: 'advancedsearch',
            component: AdvancedSearch,
            props: true,
            meta: {
                KeepAlive: true
              }
        }, 
        {
            path: '/apartments/:slug',
            name: 'apartment',
            component: Apartment
        },
        {
            path: '/chisiamo',
            name: 'chiSiamo',
            component: ChiSiamo
        },
        {
            path: '/messaggistica',
            name: 'messaggistica',
            component: Messaggistica
        },
        {
            path: '/funzionalita',
            name: 'funzionalita',
            component: Funzionalita
        },
        {
            // prendi qualsiasi cosa ci sia
            path: '/:pathMatch(.*)*', // path: '/*', 
            name: 'notFound',
            component: NotFound
        }
    ]
});

export default router