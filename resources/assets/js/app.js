
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('rest-centers-app', require('./components/RestCenters/App.vue'));
Vue.component('wysiwig', require('./components/Wysiwig.vue'));
Vue.component('attach-features', require('./components/RestCenters/AttachFeatures.vue'));
Vue.component('rest-center-accomodations-app', require('./components/RestCenters/Accomodations/App.vue'));
Vue.component("flash", require("./components/Flash.vue"));

window.events = new Vue();

window.flash = function(message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

const app = new Vue({
    el: '#app'
});
