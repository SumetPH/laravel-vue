<template>
  <div class="bg-default animated fadeIn" style="height: 100vh">
    <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
          <router-link class="navbar-brand" to="/">
            <img src="/assets/img/brand/rmuti-white.png">
          </router-link>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar-collapse-main"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="#">
                    <img src="/assets/img/brand/logo-primary.png">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button
                    type="button"
                    class="navbar-toggler"
                    data-toggle="collapse"
                    data-target="#navbar-collapse-main"
                    aria-controls="sidenav-main"
                    aria-expanded="false"
                    aria-label="Toggle sidenav"
                  >
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <router-link to="/register" class="nav-link nav-link-icon">
                  <i class="ni ni-circle-08"></i>
                  <span class="nav-link-inner--text">สมัครสมาชิก</span>
                </router-link>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link nav-link-icon"
                  href
                  id="navbar-default_dropdown_1"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="ni ni-key-25"></i>
                  <span class="nav-link-inner--text">เข้าสู่ระบบ</span>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right"
                  aria-labelledby="navbar-default_dropdown_1"
                >
                  <router-link to="/user" class="dropdown-item">สำหรับบุคลากร</router-link>
                  <router-link to="/admin" class="dropdown-item">สำหรับผู้ดูแล</router-link>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Header -->
      <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6">
                <h1 class="text-white"></h1>
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg
            x="0"
            y="0"
            viewBox="0 0 2560 100"
            preserveAspectRatio="none"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
          >
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content -->
      <div class="container pb-5" style="margin-top: -180px">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="home-title">
              <h2 class="display-2 text-white">ระบบส่งเอกสารเพื่อขอกำหนดแต่งตั้งตำแหน่งทางวิชาการ</h2>
              <h2 class="display-4 text-white">มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="py-5">
      <div class="container">
        <div
          class="row align-items-center justify-content-xl-between m-3"
          style="position: fixed; bottom: 0; right:0; left:0;"
        >
          <div class="col-lg-2 f-1">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019
              <a href class="font-weight-bold ml-1">ISR60</a>
            </div>
          </div>
          <div class="col-lg-8 f-2 text-center">
            <vue-typer
              :text="text"
              :repeat="Infinity"
              :shuffle="true"
              initial-action="typing"
              :pre-type-delay="1000"
              :type-delay="100"
              :pre-erase-delay="3000"
              :erase-delay="50"
              erase-style="backspace"
              :erase-on-complete="false"
              caret-animation="blink"
            ></vue-typer>
          </div>
          <div class="col-lg-2 f-3">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.skc.rmuti.ac.th/" class="nav-link" target="_blank">SKC RMUTI</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import { VueTyper } from "vue-typer";

export default {
  components: {
    VueTyper
  },
  data() {
    return {
      text: [
        "Document delivery system for appointment of academic position.",
        "Case study of Rajamangala university of technology Isan Sakonnakhon campus."
      ]
    };
  }
};
</script>


<style>
.navbar-horizontal .navbar-brand img {
  height: 130px;
}

.vue-typer .custom.char {
  color: white;
}

@media (max-width: 992px) {
  .f-1 {
    order: 2;
  }

  .f-2 {
    order: 1;
    margin: 20px;
  }

  .f-3 {
    order: 3;
  }

  .home-title {
    margin-top: 4rem;
  }
}
</style>

