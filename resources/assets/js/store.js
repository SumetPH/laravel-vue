import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import router from './router'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
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
		addPost(state, post) {
			state.post = post
		},
		addPost2(state, post2) {
			state.post2 = post2
		},
		addPost3(state, post3) {
			state.post3 = post3
		},
		addLoading(state, status) {
			state.isLoading = status
		}
	},
	actions: {
		loadPostAdmin(c) {
			c.commit('addLoading', true)
			axios.get(`/admin/post/${router.currentRoute.params.id}`).then(res => {
				c.commit('addLoading', false)
				console.log(res, "loadPost");
				c.commit('addPost', res.data.post);
			});
		},
		loadPost2Admin(c) {
			axios.get(`/admin/post2/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost2");
				c.commit('addPost2', res.data.post2);
			});
		},
		loadPost3Admin(c) {
			axios.get(`/admin/post3/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost3");
				c.commit('addPost3', res.data.post3);
			});
		},
		loadPostUser(c) {
			c.commit('addLoading', true)
			axios.get(`/user/post/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost");
				c.commit('addPost', res.data.post);
				c.commit('addLoading', false)
			});
		},
		loadPost2User(c) {
			axios.get(`/user/post2/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost2");
				c.commit('addPost2', res.data.post2);
			});
		},
		loadPost3User(c) {
			axios.get(`/user/post3/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost3");
				c.commit('addPost3', res.data.post3);
			});
		},
		loading(c, status) {
			c.commit('addLoading', status)
		}
	}
})