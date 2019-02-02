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
import Home from "./components/Home"
import Register from "./components/Register"
import Login from "./components/Login"

// User
import DashboardUser from "./pages/user/DashboardUser"
import PostUser from "./pages/user/PostUser"

// Admin
import DashboardAdmin from "./pages/admin/DashboardAdmin"
import PostAdmin from "./pages/admin/PostAdmin"

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
        component: DashboardUser
    },
    {
        name: "user-post-id",
        path: "/user/post/:id",
        component: PostUser
    },
    {
        name: "admin",
        path: "/admin",
        component: DashboardAdmin
    },
    {
        name: "admin-post-id",
        path: "/admin/post/:id",
        component: PostAdmin
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