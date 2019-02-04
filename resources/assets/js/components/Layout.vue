<template>
  <div class="animated fadeIn">
    <!-- Sidenav -->
    <Sidenav :who="who"></Sidenav>
    <!-- Main content -->
    <div class="main-content">
      <!-- Top navbar -->
      <Topnav :who="who" :data="data"></Topnav>
      <!-- Header -->
      <Header :bg-color="bgColor">
        <!-- slot card -->
        <slot name="card"></slot>
      </Header>
      <!-- Page content -->
      <div class="container mt--7">
        <!-- slot -->
        <slot></slot>
        <!-- Footer -->
        <Footer></Footer>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

import Sidenav from "./Sidenav.vue";
import Topnav from "./Topnav.vue";
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
  components: {
    Sidenav,
    Topnav,
    Header,
    Footer
  },
  data() {
    return {
      data: {},
      bgColor: ""
    };
  },
  computed: {
    ...mapState(["who", "user", "admin"])
  },
  created() {
    if (this.who === "user") {
      this.data = this.user.data;
      this.bgColor = "primary";
    }

    if (this.who === "admin") {
      this.data = this.admin.data;
      this.bgColor = "danger";
    }
  }
};
</script>
