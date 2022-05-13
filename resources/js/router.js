import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home';
import AdvancedSearch from './pages/AdvancedSearch';
import Apartment from './pages/Apartment';
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
            props: true
        }, 
        {
            path: '/apartments/:slug',
            name: 'apartment',
            component: Apartment
        },
        {
            // prendi qualsiasi cosa ci sia
            path: '/:pathMatch(.)', // path: '/*', 
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router