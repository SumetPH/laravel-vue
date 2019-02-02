require("./bootstrap")

window.Vue = require("vue")

import VueRouter from "vue-router"
import VueAxios from "vue-axios"
import axios from "axios"
import Notifications from 'vue-notification'

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(Notifications)

axios.defaults.baseURL = "http://localhost:8000/api"

import App from "./App.vue"
import Home from "./components/Home.vue"
import Register from "./components/Register.vue"
import Login from "./components/Login.vue"

// User
import User from "./pages/user/User.vue"
import Post from "./pages/user/Post.vue"

// Admin
import Admin from "./pages/admin/Admin.vue"

const routes = [{
        name: "home",
        path: "/",
        component: Home
    },
    {
        name: "register",
        path: "/register",
        component: Register
    },
    {
        name: "login",
        path: "/login",
        component: Login
    },
    {
        name: "user",
        path: "/user",
        component: User
    },
    {
        name: "user-post-id",
        path: "/user/post/:id",
        component: Post
    },
    {
        name: "admin",
        path: "/admin",
        component: Admin
    }
]

const router = new VueRouter({
    mode: "history",
    routes: routes
})
const app = new Vue(
    Vue.util.extend({
            router
        },
        App
    )
).$mount("#app")