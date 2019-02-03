require("./bootstrap")

window.Vue = require("vue")

import router from './router'
import store from './store'

import VueAxios from "vue-axios"
import axios from "axios"
import Notifications from 'vue-notification'

Vue.use(VueAxios, axios)
Vue.use(Notifications)

axios.defaults.baseURL = "http://localhost:8000/api"

import App from "./App.vue"


const app = new Vue(
    Vue.util.extend({
            router,
            store
        },
        App
    )
).$mount("#app")