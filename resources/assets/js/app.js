
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VModal from 'vue-js-modal';

require('./bootstrap');
require('./utils/functions.js');

window.Vue = require('vue');
Vue.use(VModal);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('rest-centers-app', require('./components/RestCenters/App.vue'));

Vue.component('medical-centers-app', require('./components/MedicalCenters/App.vue'));
Vue.component('rest-center-accomodations-app', require('./components/RestCenters/Accomodations/App.vue'));

Vue.component('kid-camps-app', require('./components/KidCamps/App.vue'));

Vue.component('active-rest-companies-app', require('./components/ActiveRestCompanies/App.vue'));

Vue.component('features-attach', require('./components/Features/FeaturesAttach.vue'));
Vue.component('features-attached', require('./components/Features/FeaturesAttached.vue'));

Vue.component('activities-attach', require('./components/Activities/ActivitiesAttach.vue'));

Vue.component('hunting-region-select', require('./components/HuntingCompanies/HuntingRegions/HuntingRegionSelect.vue'));
Vue.component('hunting-place-select', require('./components/HuntingCompanies/HuntingPlaces/HuntingPlaceSelect.vue'));

Vue.component('paid-companies-button', require('./components/PaidCompanies/PaidCompaniesButton.vue'));

Vue.component("image-upload-widget", require("./components/ImageUpload/Widget.vue"));

Vue.component('wysiwig', require('./components/Wysiwig.vue'));
Vue.component("flash", require("./components/Flash.vue"));


window.events = new Vue();

window.flash = function(message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

const app = new Vue({
    el: '#app'
});
