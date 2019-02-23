import Vue from "vue"
import Vuex from "vuex"
import axios from "axios"
import router from "./router"

Vue.use(Vuex)

const store = new Vuex.Store({
   state: {
      who: "",
      user: {
         auth: false,
         data: {}
      },
      admin: {
         auth: false,
         data: {}
      },
      post: {},
      post1: {},
      post2: [
         {
            file_path: null
         },
         {
            file_path: null
         }
      ],
      post3: [],
      reports: [],
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
         state.who = ""
         if (who === "user") {
            state.user = {
               auth: false,
               data: {}
            }
         }
         if (who === "admin") {
            state.admin = {
               auth: false,
               data: {}
            }
         }
      },
      post(state, post) {
         state.post = post
      },
      post1(state, post1) {
         state.post1 = post1
      },
      post2(state, post2) {
         state.post2 = post2
      },
      post3(state, post3) {
         state.post3 = post3
      },
      reports(state, reports) {
         state.reports = reports
      },
      loading(state, status) {
         state.isLoading = status
      }
   },
   actions: {
      fetchUser(c) {
         if (localStorage.getItem("user")) {
            c.commit("fetchUser", {
               auth: true,
               data: JSON.parse(localStorage.getItem("user"))
            })
         }
      },
      fetchAdmin(c) {
         if (localStorage.getItem("admin")) {
            c.commit("fetchAdmin", {
               auth: true,
               data: JSON.parse(localStorage.getItem("admin"))
            })
         }
      },
      logout(e, who) {
         localStorage.removeItem(who)
         e.commit("logout", who)
         router.push("/login")
      },
      loadPost({ commit }) {
         commit("loading", true)
         axios.get(`/post/${router.currentRoute.params.id}`).then(res => {
            console.log(res.data, "post")
            commit("loading", false)
            commit("post", res.data)
         })
      },
      loadPost1Admin({ commit }) {
         commit("loading", true)
         axios.get(`/admin/post/${router.currentRoute.params.id}`).then(res => {
            console.log(res.data, "post1")
            commit("post1", res.data.post1)
            commit("loading", false)
         })
      },
      loadPost2Admin(c) {
         axios
            .get(`/admin/post2/${router.currentRoute.params.id}`)
            .then(res => {
               console.log(res, "post2")
               c.commit("post2", res.data.post2)
            })
      },
      loadPost3Admin(c) {
         axios
            .get(`/admin/post3/${router.currentRoute.params.id}`)
            .then(res => {
               console.log(res, "post3")
               c.commit("post3", res.data.post3)
            })
      },
      loadPost1User({ commit }) {
         commit("loading", true)
         axios.get(`/user/post/${router.currentRoute.params.id}`).then(res => {
            console.log(res.data, "post1")
            commit("post", res.data.post)
            commit("post1", res.data.post1)
            commit("loading", false)
         })
      },
      loadPost2User(c) {
         axios.get(`/user/post2/${router.currentRoute.params.id}`).then(res => {
            console.log(res, "post2")
            c.commit("post2", res.data.post2)
         })
      },
      loadPost3User(c) {
         axios.get(`/user/post3/${router.currentRoute.params.id}`).then(res => {
            console.log(res, "post3")
            c.commit("post3", res.data.post3)
         })
      },
      loadReports(c, user_id) {
         axios.get(`/report/${user_id}`).then(res => {
            console.log(res, "loadReports")
            c.commit("reports", res.data)
         })
      },
      loading(c, status) {
         c.commit("loading", status)
      }
   }
})

export default store
