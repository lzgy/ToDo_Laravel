require('./bootstrap');
//require('./vue');
window.Vue = require('vue');

    Vue.component('welcome', require('./components/Welcome.vue'));

    const app = new Vue({
        el: '#app'
    });