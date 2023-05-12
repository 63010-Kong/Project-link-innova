import './bootstrap';
import { createApp } from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import VueAxios from 'vue-axios';
import vuetify from '@/js/plugins/vuetify.js';
import AppHelpers from '@/js/helpers/helpers.js';
import store from '@/js/store';
import router from '@/js/routes.js'
import globalMixin from './globalMixin'
import App from './App.vue'

import AOS from 'aos';
import 'aos/dist/aos.css';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */
const app = createApp(App);
app.use(Vuex);
app.use(router);
app.use(store);
app.use(vuetify);
app.use(AppHelpers);
app.use(VueAxios, axios);
app.mixin(globalMixin)

// assign global config
window.axios.default.defaults.crossDomain = true;
window.axios.default.defaults.baseURL = process.env.API_URL;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });
app.component('example-component', require('./components/ExampleComponent.vue').default);
app.component('app-bar', require('./components/AppBar.vue').default);
app.component('side-bar', require('./components/Sidebar.vue').default);
app.component('ban-ner', require('./components/Banner.vue').default);
app.component('foo-ter', require('./components/Footer.vue').default);
/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
router.isReady().then(() => {
  AOS.init();
  app.mount("#app")
}).catch((error) => {
  console.log(error);      
});