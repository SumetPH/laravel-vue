import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import router from './router'

Vue.use(Vuex)

const store = new Vuex.Store({
	state: {
		who: '',
		user: {
			auth: false,
			data: {}
		},
		admin: {
			auth: false,
			data: {}
		},
		post: {},
		post2: [{
			file_path: null
		}, {
			file_path: null
		}],
		post3: [],
		isLoading: false
	},
	mutations: {
		who(state, who) {
			state.who = who
		},
		fetchUser(state, payload) {
			state.user.auth = payload.auth
			state.user.data = payload.data
		},
		fetchAdmin(state, payload) {
			state.admin.auth = payload.auth
			state.admin.data = payload.data
		},
		logout(state, who) {
			state.who = ''
			if (who === 'user') {
				state.user = {
					auth: false,
					data: {}
				}
			}
			if (who === 'admin') {
				state.admin = {
					auth: false,
					data: {}
				}
			}
		},
		post(state, post) {
			state.post = post
		},
		post2(state, post2) {
			state.post2 = post2
		},
		post3(state, post3) {
			state.post3 = post3
		},
		loading(state, status) {
			state.isLoading = status
		}
	},
	actions: {
		fetchUser(c) {
			if (localStorage.getItem('user')) {
				c.commit('fetchUser', {
					auth: true,
					data: JSON.parse(localStorage.getItem('user'))
				})
			}
		},
		fetchAdmin(c) {
			if (localStorage.getItem('admin')) {
				c.commit('fetchAdmin', {
					auth: true,
					data: JSON.parse(localStorage.getItem('admin'))
				})
			}
		},
		logout(e, who) {
			localStorage.removeItem(who)
			e.commit('logout', who)
			router.push('/login')
		},
		loadPostAdmin(c) {
			c.commit('loading', true)
			axios.get(`/admin/post/${router.currentRoute.params.id}`).then(res => {
				c.commit('loading', false)
				console.log(res, "post");
				c.commit('post', res.data.post);
			});
		},
		loadPost2Admin(c) {
			axios.get(`/admin/post2/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "post2");
				c.commit('post2', res.data.post2);
			});
		},
		loadPost3Admin(c) {
			axios.get(`/admin/post3/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "post3");
				c.commit('post3', res.data.post3);
			});
		},
		loadPostUser(c) {
			c.commit('loading', true)
			axios.get(`/user/post/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "post");
				c.commit('post', res.data.post);
				c.commit('loading', false)
			});
		},
		loadPost2User(c) {
			axios.get(`/user/post2/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "post2");
				c.commit('post2', res.data.post2);
			});
		},
		loadPost3User(c) {
			axios.get(`/user/post3/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "post3");
				c.commit('post3', res.data.post3);
			});
		},
		loading(c, status) {
			c.commit('loading', status)
		}
	}
})

export default store