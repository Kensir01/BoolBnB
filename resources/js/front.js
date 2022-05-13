window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue';
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
import App from './views/App';

//aggiungo per usare vue-router
import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});