import Vue from 'vue'
import VueRouter from "vue-router"

Vue.use(VueRouter)

import Home from "./components/Home.vue"
import Register from "./components/Register.vue"
import Login from "./components/Login.vue"
import PasswordReset from "./pages/password/Reset.vue"

// User
import DashboardUser from "./pages/user/DashboardUser.vue"
import PostUser from "./pages/user/PostUser.vue"
import PasswordUser from "./pages/user/PasswordUser.vue"

// Admin
import DashboardAdmin from "./pages/admin/DashboardAdmin.vue"
import PostAdmin from "./pages/admin/PostAdmin.vue"
import UserAdmin from "./pages/admin/UserAdmin.vue"


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
			name: "password-reset",
			path: "/password/reset",
			component: PasswordReset
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
			name: "user-password",
			path: "/user/password",
			component: PasswordUser
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
		},
		{
			name: 'admin-user',
			path: '/admin/user',
			component: UserAdmin
		}
	]
})