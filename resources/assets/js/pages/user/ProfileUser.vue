<template>
  <Layout>
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img
                    :src="user.data.image ? '/files/' + user.data.image : '/files/image/profile.png' "
                    class="rounded-circle"
                  >
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <!-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
              <a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <!-- <div>
                    <span class="heading">22</span>
                    <span class="description">Friends</span>
                  </div>
                  <div>
                    <span class="heading">10</span>
                    <span class="description">Photos</span>
                  </div>
                  <div>
                    <span class="heading">89</span>
                    <span class="description">Comments</span>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                {{user.data.firstname ? user.data.firstname + ' ' + user.data.lastname : ''}}
                <!-- <span class="font-weight-light">, 27</span> -->
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>
                ตำแหน่ง : {{user.data.position}}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>
                สาขา : {{user.data.branch}}
                <br>
                <i class="ni business_briefcase-24 mr-2"></i>
                คณะ : {{user.data.faculty}}
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>
                {{user.data.university}}
              </div>
              <hr class="my-4">
              <!-- <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p> -->
              <a @click.prevent="$refs.image.click()" href>เปลี่ยนรูปโปรไฟล์</a>
              <input @change="updateImgProfile" ref="image" type="file" style="display: none">
              <p></p>
              <small class="text-red">กรุณาใช้รูปที่เป็นอัตราส่วน 1 : 1</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0 text-muted">ข้อมูลผู้ใช้</h3>
              </div>
              <div class="col-4 text-right">
                <!-- <a href="#!" class="btn btn-sm btn-primary">Settings</a> -->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-9">
                <form @submit.prevent="updateProfile">
                  <div class="form-group">
                    <label for="firstname" class="col-md-4 control-label">ชื่อ</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="firstname"
                      required
                      v-model="user.data.firstname"
                    >
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="col-md-4 control-label">นามสกุล</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="lastname"
                      required
                      v-model="user.data.lastname"
                    >
                  </div>

                  <div class="form-group">
                    <label for="education" class="col-md-4 control-label">วุฒิ</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="education"
                      required
                      v-model="user.data.education"
                    >
                  </div>

                  <div class="form-group">
                    <label for="position" class="col-md-4 control-label">ตำแหน่ง</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="position"
                      required
                      v-model="user.data.position"
                    >
                  </div>

                  <div class="form-group">
                    <label for="branch" class="col-md-4 control-label">สาขา</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="branch"
                      required
                      v-model="user.data.branch"
                    >
                  </div>

                  <div class="form-group">
                    <label for="faculty" class="col-md-4 control-label">คณะ</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="faculty"
                      required
                      v-model="user.data.faculty"
                    >
                  </div>
                  <div class="form-group">
                    <label for="university" class="col-md-4 control-label">มหาวิทยาลัย</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="university"
                      required
                      v-model="user.data.university"
                    >
                  </div>
                  <div class="form-group">
                    <label for="campus" class="col-md-4 control-label">วิทยาเขต</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="campus"
                      required
                      v-model="user.data.campus"
                    >
                  </div>
                  <div class="form-group">
                    <label for="number" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      name="number"
                      required
                      v-model="user.data.number"
                    >
                  </div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">บันทึก</button>
                      <button @click="loadProfile" type="reset" class="btn btn-danger">ยกเลิก</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import Layout from "../../components/Layout";

import { mapState, mapActions } from "vuex";
export default {
  components: {
    Layout
  },
  data() {
    return {
      profile: {}
    };
  },
  methods: {
    ...mapActions(["loading"]),
    loadProfile() {
      this.user.data = JSON.parse(localStorage.getItem("user"));
    },
    updateProfile() {
      this.loading(true);
      this.user.data._method = "put";
      axios
        .post(`/user/profile/${this.user.data.id}`, this.user.data)
        .then(res => {
          console.log(res, "updateProfile");
          if (res.data.status === "success") {
            this.$notify("Updating..");
            localStorage.setItem("user", JSON.stringify(res.data.data));
            this.user.data = res.data.data;
          } else {
            this.$notify("Error");
          }
          this.loading(false);
        });
    },
    updateImgProfile() {
      this.loading(true);
      let formData = new FormData();
      formData.append("_method", "put");
      formData.append("image", this.$refs.image.files[0]);

      axios.post(`/user/profile/${this.user.data.id}`, formData).then(res => {
        console.log(res, "updateImgProfile");
        if (res.data.status === "success") {
          this.$notify("Updating..");
          localStorage.setItem("user", JSON.stringify(res.data.data));
          this.user.data = res.data.data;
        } else {
          this.$notify("Error");
        }
        this.loading(false);
      });
    }
  },
  computed: {
    ...mapState(["user"])
  }
};
</script>