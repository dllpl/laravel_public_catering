import { createApp } from 'vue'
import App from './App.vue'
import router from "./router/router.js";
import axios from "./plugins/axios.js";

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

createApp(App)
    .use(router,axios)
    .mount('#app')
