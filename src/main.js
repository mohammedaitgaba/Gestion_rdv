import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import '../src/assets/index.css'



// import "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
createApp(App).use(router).mount('#app')
