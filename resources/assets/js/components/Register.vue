<template>
  <div class="bg-default animated fadeIn">
    <div class="main-content">
      <!-- Navbar -->
      <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
          <router-link class="navbar-brand" to="/">
            <img src="/assets/img/brand/logo-white.png">
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
      <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6">
                <h1 class="text-white">สมัครสมาชิก</h1>
                <p class="text-lead text-white">สำหรับบุคลากร</p>
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
        <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
              <!-- <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 mb-4">
                  <small>Sign up with</small>
                </div>
                <div class="text-center">
                  <a href="#" class="btn btn-neutral btn-icon mr-4">
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
                  <small>Or sign up with credentials</small>
                </div>-->
                <form role="form" @submit.prevent="submit">
                  <div class="form-group mb-3">
                    <label for="firstname" class="control-label">ชื่อ</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="firstname"
                        placeholder="ชื่อ"
                        type="text"
                        required
                        v-model="firstname"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="lastname" class="control-label">นามสกุล</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="lastname"
                        placeholder="นามสกุล"
                        type="text"
                        required
                        v-model="lastname"
                      >
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <label for="email" class="control-label">อีเมล</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="email"
                        placeholder="อีเมล"
                        type="text"
                        required
                        v-model="email"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="password" class="control-label">รหัสผ่าน</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
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
                  <div class="form-group mb-3">
                    <label for="password_confirmation" class="control-label">รหัสผ่าน (ยืนยัน)</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="password_confirmation"
                        placeholder="รหัสผ่าน (ยืนยัน)"
                        type="password"
                        required
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="education" class="control-label">วุฒิ</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="education"
                        placeholder="วุฒิ"
                        type="text"
                        required
                        v-model="education"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="position" class="control-label">ตำแหน่ง</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="position"
                        placeholder="ตำแหน่ง"
                        type="text"
                        required
                        v-model="position"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="branch" class="control-label">สาขา</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="branch"
                        placeholder="สาขา"
                        type="text"
                        required
                        v-model="branch"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="faculty" class="control-label">คณะ</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="faculty"
                        placeholder="คณะ"
                        type="text"
                        required
                        v-model="faculty"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="university" class="control-label">มหาวิทยาลัย</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="university"
                        placeholder="มหาวิทยาลัย"
                        type="text"
                        required
                        v-model="university"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="campus" class="control-label">วิทยาเขต</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="campus"
                        placeholder="วิทยาเขต"
                        type="text"
                        required
                        v-model="campus"
                      >
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="number" class="control-label">เบอร์โทรศัพท์</label>
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                      </div>
                      <input
                        class="form-control"
                        name="number"
                        placeholder="เบอร์โทรศัพท์"
                        type="text"
                        required
                        v-model="number"
                      >
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                  <button type="reset" class="btn btn-danger">ยกเลิก</button>
                </form>
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
              &copy; 2018
              <a
                href="https://www.creative-tim.com"
                class="font-weight-bold ml-1"
                target="_blank"
              >
                Creative
                Tim
              </a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a
                  href="https://www.creative-tim.com/presentation"
                  class="nav-link"
                  target="_blank"
                >About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a
                  href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                  class="nav-link"
                  target="_blank"
                >MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      education: "",
      position: "",
      branch: "",
      faculty: "",
      university: "มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน",
      campus: "วิทยาเขตสกลนคร",
      number: ""
    };
  },
  methods: {
    submit() {
      let formData = new FormData();
      formData.append("firstname", this.firstname);
      formData.append("lastname", this.lastname);
      formData.append("email", this.email);
      formData.append("password", this.password);
      formData.append("education", this.education);
      formData.append("position", this.position);
      formData.append("branch", this.branch);
      formData.append("faculty", this.faculty);
      formData.append("university", this.university);
      formData.append("campus", this.campus);
      formData.append("number", this.number);

      axios.post("/register", formData).then(res => {
        console.log(res);
      });
    }
  }
};
</script>

