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
                  <a href="index.html">
                    <img src="assets/img/brand/blue.png">
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
              <!-- <li class="nav-item">
                <a class="nav-link nav-link-icon" href="index.html">
                  <i class="ni ni-planet"></i>
                  <span class="nav-link-inner--text">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="examples/register.html">
                  <i class="ni ni-circle-08"></i>
                  <span class="nav-link-inner--text">Register</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="examples/login.html">
                  <i class="ni ni-key-25"></i>
                  <span class="nav-link-inner--text">Login</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-link-icon" href="examples/profile.html">
                  <i class="ni ni-single-02"></i>
                  <span class="nav-link-inner--text">Profile</span>
                </a>
              </li>-->
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
                <h1 class="text-white">เข้าสู่ระบบ</h1>
                <p class="text-lead text-white">สำหรับบุคลากร และ ผู้ดูแล</p>
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
      <div class="container pb-5" style="margin-top: -200px">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
              <!-- <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 mb-3">
                  <small>Sign in with</small>
                </div>
                <div class="btn-wrapper text-center">
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img src="assets/img/icons/common/github.svg">
                    </span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon">
                      <img src="assets/img/icons/common/google.svg">
                    </span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </div>-->
              <div class="card-body px-lg-5 py-lg-5">
                <!-- <div class="text-center text-muted mb-4">
                  <small>Or sign in with credentials</small>
                </div>-->
                <form role="form" @submit.prevent="submit">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-email-83"></i>
                        </span>
                      </div>
                      <input
                        class="form-control"
                        name="email"
                        placeholder="อีเมล หรือ ชื่อผู้ใช้"
                        type="text"
                        required
                        v-model="email"
                      >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="ni ni-lock-circle-open"></i>
                        </span>
                      </div>
                      <input
                        class="form-control"
                        name="password"
                        placeholder="รหัสผ่าน"
                        type="password"
                        required
                        v-model="password"
                      >
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">เข้าสู่ระบบ</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                <!-- <a href="#" class="text-light">
                  <small>Create new account</small>
                </a>-->
              </div>
              <div class="col-6 text-right">
                <router-link to="/password/send" class="text-light">
                  <small>ลืมรหัสผ่าน</small>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019
              <a href class="font-weight-bold ml-1" target="_blank">ISR60</a>
            </div>
          </div>
          <div class="col-xl-6">
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
import { mapActions } from "vuex";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    ...mapActions(["loading"]),
    submit() {
      this.loading(true);
      let formData = new FormData();
      formData.append("email", this.email);
      formData.append("password", this.password);

      axios.post("/login", formData).then(res => {
        console.log(res);
        this.loading(false);
        if (res.data.status === "user") {
          this.$notify("เข้าสู่ระบบ");
          localStorage.setItem("user", JSON.stringify(res.data.user));
          this.$router.push("/user");
        } else if (res.data.status === "admin") {
          this.$notify("เข้าสู่ระบบ");
          localStorage.setItem("admin", JSON.stringify(res.data.admin));
          this.$router.push("/admin");
        } else {
          this.$notify("กรุณาลองใหม่อีกครั้ง");
        }
      });
    }
  }
};
</script>

<style scoped>
.navbar-horizontal .navbar-brand img {
  height: 130px;
}
</style>