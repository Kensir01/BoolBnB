window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue';
import App from './views/App';

//aggiungo per usare vue-router
import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
});