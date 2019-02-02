<template>
  <div class="animated fadeIn">
    <!-- Sidenav -->
    <Sidenav :who="who"></Sidenav>
    <!-- Main content -->
    <div class="main-content">
      <!-- Top navbar -->
      <Topnav :who="who" :data="user"></Topnav>
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
import Sidenav from "../../components/Sidenav";
import Topnav from "../../components/Topnav";
import Header from "../../components/Header";
import Footer from "../../components/Footer";

export default {
  components: {
    Sidenav,
    Topnav,
    Header,
    Footer
  },
  data() {
    return {
      user: {},
      who: "user",
      bgColor: "primary"
    };
  },
  created() {
    if (!localStorage.getItem("user")) {
      this.$router.push("/login");
    } else {
      this.user = JSON.parse(localStorage.getItem("user"));
    }
  }
};
</script>
