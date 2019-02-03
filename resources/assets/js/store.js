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
		}]

	},
	mutations: {
		addPost(state, post) {
			state.post = post
		},
		addPost2(state, post2) {
			state.post2 = post2
		}
	},
	actions: {
		loadPostAdmin(c) {
			axios.get(`/admin/post/${router.currentRoute.params.id}`).then(res => {
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
		loadPostUser(c) {
			axios.get(`/user/post/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPost");
				c.commit('addPost', res.data.post);
			});
		},
		loadPost2User(c) {
			axios.get(`/user/post2/${router.currentRoute.params.id}`).then(res => {
				console.log(res, "loadPos2t");
				c.commit('addPost2', res.data.post2);
			});
		}
	}
})