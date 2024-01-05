import { createApp } from 'vue'
import './index.css' 
import App from './App.vue'
import Notifications from '@kyvg/vue3-notification'
import {createPinia} from"pinia"
import router from './router'
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true;
const pinia = createPinia()



createApp(App).use(router).use(Notifications).use(pinia).mount('#app')
export {pinia}


