<template>
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <router-link
        :to="who === 'user' ? '/user' : '/admin'"
        class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
      >หน้าแรก</router-link>
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <router-link :to="who === 'user' ? '/user/profile' : ''" class="nav-link pr-0">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img v-if="who === 'user'" :src="'/files/' + data.image" alt="Image placeholder">
                <img v-else alt="Image placeholder" src="/files/image/profile.png">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm font-weight-bold">{{data.firstname}}</span>
              </div>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  props: ['who', 'data'],
  methods: {
    logout() {
      localStorage.removeItem(this.who)
      this.$router.push('/login')
    }
  }
}
</script>