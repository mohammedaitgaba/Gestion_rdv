import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import '../src/assets/index.css'

import Cookies from 'js-cookie'
 
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
createApp(App).use(VueSweetalert2).
use(router).mount("#app");
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import Vue from "vue";
import VueCookies from 'vue-cookies';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap';

// Cookies.set('id',"faiza")

{/* <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> */}

// createApp(App).use(router).mount('#app')
