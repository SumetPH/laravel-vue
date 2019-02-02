<template>
  <div class="animated fadeIn">
    <!-- Sidenav -->
    <Sidenav :who="who"></Sidenav>
    <!-- Main content -->
    <div class="main-content">
      <!-- Top navbar -->
      <Topnav :who="who" :data="admin"></Topnav>
      <!-- Header -->
      <Header :bg-color="bgColor">
        <!-- slot card -->
        <slot name="card"></slot>
      </Header>
      <!-- Page content -->
      <div class="container-fluid mt--7">
        <!-- slot -->
        <slot></slot>
        <!-- Footer -->
        <Footer></Footer>
      </div>
    </div>
  </div>
</template>

<script>
import Sidenav from "../../components/Sidenav.vue";
import Topnav from "../../components/Topnav.vue";
import Header from "../../components/Header.vue";
import Footer from "../../components/Footer.vue";

export default {
  components: {
    Sidenav,
    Topnav,
    Header,
    Footer
  },
  data() {
    return {
      admin: {},
      who: "admin",
      bgColor: "danger"
    };
  },
  created() {
    if (!localStorage.getItem("admin")) {
      this.$router.push("/login");
    } else {
      this.admin = JSON.parse(localStorage.getItem("admin"));
    }
  }
};
</script>
