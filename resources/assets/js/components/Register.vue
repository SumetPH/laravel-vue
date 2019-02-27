<template>
  <div class="bg-default animated fadeIn">
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
      <div class="header bg-gradient-success py-7 py-lg-8">
        <div class="container">
          <div class="header-body text-center mb-7 mt-5">
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
              <div class="card-body px-lg-5 py-lg-5">
                <form role="form" @submit.prevent="submit">
                  <div class="form-group mb-3">
                    <label class="control-label">คำนำหน้า</label>
                    <select class="form-control" v-model="title">
                      <option value="นาย">นาย</option>
                      <option value="นาง">นาง</option>
                      <option value="นางสาว">นางสาว</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label class="control-label">ตำแหน่งทางวิชาการ</label>
                    <select class="form-control" v-model="academic">
                      <option value="-">-</option>
                      <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                      <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                      <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                    </select>
                  </div>

                  <div class="form-group mb-3">
                    <label for="firstname" class="control-label">ชื่อ</label>
                    <input
                      class="form-control"
                      name="firstname"
                      placeholder="ชื่อ"
                      type="text"
                      required
                      v-model="firstname"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="lastname" class="control-label">นามสกุล</label>
                    <input
                      class="form-control"
                      name="lastname"
                      placeholder="นามสกุล"
                      type="text"
                      required
                      v-model="lastname"
                    >
                  </div>

                  <div class="form-group mb-3">
                    <label for="email" class="control-label">อีเมล</label>
                    <input
                      class="form-control"
                      name="email"
                      placeholder="อีเมล"
                      type="text"
                      required
                      v-model="email"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="password" class="control-label">รหัสผ่าน</label>
                    <input
                      :style="checkPass < 6 ? 'border-color: #fb6340' : ''"
                      :class="checkPass < 6 ? 'form-control is-invalid' : 'form-control'"
                      name="password"
                      placeholder="รหัสผ่าน"
                      type="password"
                      minlength="6"
                      required
                      v-model="password"
                      @blur="funcChekPass"
                    >
                    <div v-if="checkPass < 6" class="invalid-feedback">รหัสผ่านต้องมีอย่างน้อย 6 ตัว</div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="password_confirmation" class="control-label">รหัสผ่าน (ยืนยัน)</label>
                    <input
                      class="form-control"
                      name="password_confirmation"
                      placeholder="รหัสผ่าน (ยืนยัน)"
                      type="password"
                      required
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="education" class="control-label">วุฒิ</label>
                    <input
                      class="form-control"
                      name="education"
                      placeholder="วุฒิ"
                      type="text"
                      required
                      v-model="education"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="position" class="control-label">ตำแหน่ง</label>
                    <input
                      class="form-control"
                      name="position"
                      placeholder="ตำแหน่ง"
                      type="text"
                      required
                      v-model="position"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="branch" class="control-label">สาขา</label>
                    <input
                      class="form-control"
                      name="branch"
                      placeholder="สาขา"
                      type="text"
                      required
                      v-model="branch"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="faculty" class="control-label">คณะ</label>
                    <input
                      class="form-control"
                      name="faculty"
                      placeholder="คณะ"
                      type="text"
                      required
                      v-model="faculty"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="university" class="control-label">มหาวิทยาลัย</label>
                    <input
                      class="form-control"
                      name="university"
                      placeholder="มหาวิทยาลัย"
                      type="text"
                      required
                      v-model="university"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="campus" class="control-label">วิทยาเขต</label>
                    <input
                      class="form-control"
                      name="campus"
                      placeholder="วิทยาเขต"
                      type="text"
                      required
                      v-model="campus"
                    >
                  </div>
                  <div class="form-group mb-3">
                    <label for="number" class="control-label">เบอร์โทรศัพท์</label>
                    <input
                      class="form-control"
                      name="number"
                      placeholder="เบอร์โทรศัพท์"
                      type="text"
                      required
                      v-model="number"
                    >
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
              &copy; 2019
              <a href class="font-weight-bold ml-1">ISR60</a>
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
      title: "นาย",
      academic: "-",
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
      number: "",
      checkPass: 6
    };
  },
  methods: {
    ...mapActions(["loading"]),
    submit() {
      this.loading(true);
      let formData = new FormData();
      formData.append("title", this.title);
      formData.append("academic", this.academic);
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
        if (res.data === "success") {
          this.$notify("กรุณารอการยืนยันจากเจ้าหน้าที่ ก่อนเข้าใช้งาน");
          this.$router.push("/login");
        } else {
          this.$notify("กรุณาลองใหม่อีกครั้ง");
        }
        this.loading(false);
      });
    },
    funcChekPass() {
      this.checkPass = this.password.length;
    }
  }
};
</script>

<style scoped>
.navbar-horizontal .navbar-brand img {
  height: 130px;
}
</style>