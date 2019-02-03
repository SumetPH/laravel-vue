import Vue from 'vue'
import VueRouter from "vue-router"

Vue.use(VueRouter)

import Home from "./components/Home"
import Register from "./components/Register"
import Login from "./components/Login"

// User
import DashboardUser from "./pages/user/DashboardUser"
import PostUser from "./pages/user/PostUser"

// Admin
import DashboardAdmin from "./pages/admin/DashboardAdmin"
import PostAdmin from "./pages/admin/PostAdmin"


export default new VueRouter({
	mode: "history",
	routes: [{
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
})