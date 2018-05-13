/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'babel-polyfill';
import PortalVue from 'portal-vue';
require('./bootstrap');
require('./utils/functions.js');

window.Vue = require('vue');

Vue.use(PortalVue);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sm-md-main-menu', require('./components/UI/SmMdMainMenu.vue'));

Vue.component('rest-centers-search', require('./components/UI/RestCenters/Search.vue'));
Vue.component('rest-center', require('./components/UI/RestCenters/RestCenter.vue'));

window.events = new Vue();

window.flash = function(message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

const app = new Vue({
    el: '#app',
    data () {
        return {
            showMainMenu: false,
            showSearchDrowdown: false,
            showSorting: false,
            restCenters: []
        };
    },

    methods: {
        updateRestCenters (restCenters) {
            this.restCenters = restCenters;
        }
    }
});
