require('select2');
require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('coment-component', require('./components/User/Coments/ComentComponent.vue').default);
Vue.component('user-component', require('./components/User/UserComponent.vue').default);
Vue.component('user-form-component', require('./components/User/UserFormComponent.vue').default);
Vue.component('user-field-component', require('./components/User/UserFieldComponent.vue').default);
Vue.component('user-data-component', require('./components/User/UserDataComponent.vue').default);
Vue.component('company-modal-component', require('./components/Company/CompanyModalComponent.vue').default);
Vue.component('company-show-component', require('./components/Company/CompanyShowComponent.vue').default);
Vue.component('company-component', require('./components/Company/CompanyComponent.vue').default);
Vue.component('company-list-component', require('./components/Company/CompanyListComponent.vue').default);
Vue.component('company-form-component', require('./components/Company/CompanyFormComponent.vue').default);
Vue.component('payment-component', require('./components/Payment/PaymentComponent.vue').default);
Vue.component('payment-list-component', require('./components/Payment/PaymentListComponent.vue').default);
Vue.component('payment-form-component', require('./components/Payment/PaymentFormComponent.vue').default);
Vue.component('category-component', require('./components/Category/CategoryComponent.vue').default);
Vue.component('category-list-component', require('./components/Category/CategoryListComponent.vue').default);
Vue.component('category-form-component', require('./components/Category/CategoryFormComponent.vue').default);
Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
Vue.component('result-component', require('./components/ResultComponent.vue').default);
Vue.component('search-component', require('./components/SearchComponent.vue').default);
Vue.component('map-component', require('./components/Maps/MapComponent.vue').default);
Vue.component('map-show-component', require('./components/Maps/MapShowComponent.vue').default);

// Libreria for maps, (Global)
import { LMap, LTileLayer, LMarker, LCircleMarker, LIcon, LControlAttribution, LTooltip, LPopup } from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css'

Vue.component('l-map', LMap);
Vue.component('l-tile-layer', LTileLayer);
Vue.component('l-marker', LMarker);
Vue.component('l-circle-marker', LCircleMarker);
Vue.component('l-icon', LIcon);
Vue.component('l-control-attribution', LControlAttribution);
Vue.component('l-tooltip', LTooltip);
Vue.component('l-popup', LPopup);

const app = new Vue({
    el: '#app',
});