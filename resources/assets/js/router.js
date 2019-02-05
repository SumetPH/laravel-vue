import Vue from 'vue'
import VueRouter from "vue-router"
import store from './store'

Vue.use(VueRouter)

import Test from "./test/Test.vue"
import Home from "./components/Home.vue"
import Register from "./components/Register.vue"
import Login from "./components/Login.vue"
import PasswordReset from "./pages/password/Reset.vue"

// User
import DashboardUser from "./pages/user/DashboardUser.vue"
import PostUser from "./pages/user/PostUser.vue"
import PasswordUser from "./pages/user/PasswordUser.vue"
import ProfileUser from "./pages/user/ProfileUser.vue"

// Admin
import DashboardAdmin from "./pages/admin/DashboardAdmin.vue"
import PostAdmin from "./pages/admin/PostAdmin.vue"
import UserAdmin from "./pages/admin/UserAdmin.vue"


const router = new VueRouter({
	mode: "history",
	routes: [{
			name: 'test',
			path: '/test',
			component: Test
		}, {
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
			name: "user-profile",
			path: "/user/profile",
			component: ProfileUser
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

router.beforeEach((to, from, next) => {
	store.dispatch('fetchUser')
	store.dispatch('fetchAdmin')
	if (to.name === 'user' || to.name === 'user-post-id' || to.name === 'user-password' || to.name === 'user-profile') {
		if (store.state.user.auth) {
			store.commit('who', 'user')
			next()
		} else {
			next('/login')
		}
	} else if (to.name === 'admin' || to.name === 'admin-post-id' || to.name === 'admin-user') {
		if (store.state.admin.auth) {
			store.commit('who', 'admin')
			next()
		} else {
			next('/login')
		}
	} else {
		next()
	}
})

export default router