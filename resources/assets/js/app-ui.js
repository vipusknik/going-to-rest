/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import 'babel-polyfill';
import PortalVue from 'portal-vue';
require('./bootstrap');
require('./utils/functions.js');
window._ = require('lodash')

window.Vue = require('vue');

Vue.use(PortalVue);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sm-md-main-menu', require('./components/UI/SmMdMainMenu.vue'));
Vue.component('sm-md-nav', require('./components/UI/SmMdNav.vue'));
Vue.component('carousel', require('./components/UI/Carousel.vue'));
Vue.component('promo-widget', require('./components/UI/Promo/PromoWidget.vue'));
Vue.component('models-page', require('./components/UI/ModelsPage.vue'));

Vue.component('rest-centers-search', require('./components/UI/RestCenters/Search.vue'));
Vue.component('rest-center', require('./components/UI/RestCenters/RestCenter.vue'));

Vue.component('medical-centers-search', require('./components/UI/MedicalCenters/Search.vue'));
Vue.component('medical-center', require('./components/UI/MedicalCenters/MedicalCenter.vue'));

Vue.component('kid-camps-search', require('./components/UI/KidCamps/Search.vue'));
Vue.component('kid-camp', require('./components/UI/KidCamps/KidCamp.vue'));

Vue.component('active-rest-companies-search', require('./components/UI/ActiveRestCompanies/Search.vue'));
Vue.component('active-rest-company', require('./components/UI/ActiveRestCompanies/ActiveRestCompany.vue'));
Vue.component('active-rest-company-page', require('./components/UI/ActiveRestCompanies/ActiveRestCompanyPage.vue'));

Vue.component('hunting-companies-search', require('./components/UI/HuntingCompanies/Search.vue'));
Vue.component('hunting-company', require('./components/UI/HuntingCompanies/HuntingCompany.vue'));
Vue.component('hunting-company-page', require('./components/UI/HuntingCompanies/HuntingCompanyPage.vue'));

Vue.component('faded', require('./components/UI/Faded.vue'));
Vue.component('jump-up-button', require('./components/UI/JumpUpButton.vue'));
Vue.component('model-category', require('./components/UI/ModelCategory.vue'));

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
            showSorting: false
        };
    }
});
