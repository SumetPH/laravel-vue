<template>
  <nav
    class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white"
    id="sidenav-main"
  >
    <div class="container-fluid">
      <!-- Toggler -->
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#sidenav-collapse-main"
        aria-controls="sidenav-main"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <router-link class="navbar-brand pt-0" to="/">
        <img src="/assets/img/brand/rmuti-black.png" class="navbar-brand-img" alt="...">
      </router-link>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <div
            class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
            aria-labelledby="navbar-default_dropdown_1"
          >
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <router-link :to="who === 'user' ? '/user/profile' : '#'">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img v-if="who === 'user'" alt="Image placeholder" :src="'/files/' + data.image">
                <img v-else alt="Image placeholder" src="/files/image/profile.png">
              </span>
            </div>
          </router-link>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <router-link to="/">
                <img src="/assets/img/brand/dds-primary.png">
              </router-link>
            </div>
            <div class="col-6 collapse-close">
              <button
                type="button"
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#sidenav-collapse-main"
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
        <!-- Navigation -->
        <!-- for user -->
        <ul v-if="who === 'user'" class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/user">
              <i class="ni ni-tv-2 text-primary"></i>
              หน้าแรก
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/report">
              <i class="ni ni-bullet-list-67 text-red"></i>
              รายงาน
              <span class="badge badge-warning ml-2">{{reports.length}}</span>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/profile">
              <i class="ni ni-single-02 text-yellow"></i>
              ข้อมูลผู้ใช้
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/password">
              <i class="ni ni-key-25 text-info"></i>
              เปลี่ยนรหัสผ่าน
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/user/doc">
              <i class="ni ni-pin-3 text-orange"></i>
              เอกสาร
            </router-link>
          </li>
        </ul>

        <!-- for admin -->
        <ul v-if="who === 'admin'" class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to="/admin">
              <i class="ni ni-tv-2 text-primary"></i>
              หน้าแรก
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/admin/user">
              <i class="ni ni-single-02 text-yellow"></i>
              จัดการผู้ใช้
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/admin/password" class="nav-link">
              <i class="ni ni-key-25 text-info"></i>
              เปลี่ยนรหัสผ่าน
            </router-link>
          </li>
        </ul>

        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">เพิ่มเติม</h6>
        <!-- Navigation -->
        <ul v-if="who === 'admin'" class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a @click.prevent="logout('admin')" class="nav-link" href>
              <i class="ni ni-user-run text-green"></i>
              ออกจากระบบ
            </a>
          </li>
        </ul>
        <ul v-else class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a @click.prevent="logout('user')" class="nav-link" href>
              <i class="ni ni-user-run text-green"></i>
              ออกจากระบบ
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapActions } from "vuex";
export default {
  props: ["who", "data", "reports"],
  methods: {
    ...mapActions(["logout", "loadReports"])
  },
  mounted() {
    this.loadReports(this.data.id);
  }
};
</script>


<style scoped>
.navbar-brand-img {
  max-height: 10rem !important;
}
</style>
