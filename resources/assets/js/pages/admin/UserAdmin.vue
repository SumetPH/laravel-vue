<template>
  <LayoutAdmin>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title mb-0 text-muted">จักการผู้ใช้งาน</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead>
                  <tr>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">อีเมล</th>
                    <th scope="col">เพิ่มเติม</th>
                    <th>สถานะ</th>
                    <th>การใช้งาน</th>
                    <th>ลบ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, index) in users" :key="index">
                    <td>{{ user.firstname}}</td>
                    <td>{{ user.lastname}}</td>
                    <td>{{ user.email}}</td>
                    <td>
                      <a @click.prevent="modalHandle(index)" href>รายละเอียดเพิ่มเติม</a>
                    </td>
                    <td>
                      <span v-if="user.active === '0'">ยังไม่ได้รับการอนุมัติ</span>
                      <span>ได้รับการอนุมัติแล้ว</span>
                    </td>
                    <td class="p-2">
                      <button
                        v-if="user.active === '0'"
                        class="btn btn-success"
                        @click="activeUser(user.id, 1)"
                      >ยืนยัน</button>
                      <button
                        v-else
                        class="btn btn-warning"
                        @click="activeUser(user.id, 0)"
                      >ยกเลิกการยืนยัน</button>
                    </td>
                    <td class="p-2">
                      <button @click="deleteUser(user.id)" class="btn btn-danger">ลบ</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="row">
      <div
        v-if="modal"
        class="modal animated slideInDown"
        style="display: block"
        id="myModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
      >
        <div class="modal-dialog" role="document" data-show="true">
          <div class="modal-content">
            <div class="modal-header">
              <button
                @click="modalHandle"
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">คำร้องขอ</h4>
            </div>
            <div class="modal-body">
              <div class="row justify-content-center">
                <div class="col-md-9">
                  <div class="form-group">
                    <label for="firstname" class="control-label">ชื่อ</label>
                    <input
                      type="text"
                      class="form-control"
                      name="firstname"
                      disabled
                      :value="modalUser.firstname"
                    >
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="control-label">นามสกุล</label>
                    <input
                      type="text"
                      class="form-control"
                      name="lastname"
                      disabled
                      :value="modalUser.lastname"
                    >
                  </div>

                  <div class="form-group">
                    <label for="email" class="control-label">อีเมล</label>
                    <input
                      class="form-control"
                      type="text"
                      name="email"
                      :value="modalUser.email"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="education" class="control-label">วุฒิ</label>
                    <input
                      type="text"
                      class="form-control"
                      name="education"
                      disabled
                      :value="modalUser.education"
                    >
                  </div>

                  <div class="form-group">
                    <label for="position" class="control-label">ตำแหน่ง</label>
                    <input
                      type="text"
                      class="form-control"
                      name="position"
                      disabled
                      :value="modalUser.position"
                    >
                  </div>

                  <div class="form-group">
                    <label for="branch" class="control-label">สาขา</label>
                    <input
                      type="text"
                      class="form-control"
                      name="branch"
                      disabled
                      :value="modalUser.branch"
                    >
                  </div>

                  <div class="form-group">
                    <label for="faculty" class="control-label">คณะ</label>
                    <input
                      type="text"
                      class="form-control"
                      name="faculty"
                      disabled
                      :value="modalUser.faculty"
                    >
                  </div>
                  <div class="form-group">
                    <label for="university" class="control-label">มหาวิทยาลัย</label>
                    <input
                      type="text"
                      class="form-control"
                      name="university"
                      disabled
                      :value="modalUser.university"
                    >
                  </div>
                  <div class="form-group">
                    <label for="campus" class="control-label">วิทยาเขต</label>
                    <input
                      type="text"
                      class="form-control"
                      name="campus"
                      disabled
                      :value="modalUser.campus"
                    >
                  </div>
                  <div class="form-group">
                    <label for="number" class="control-label">เบอร์โทรศัพท์</label>
                    <input
                      type="text"
                      class="form-control"
                      name="number"
                      disabled
                      :value="modalUser.number"
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                v-if="modalUser.active === '0'"
                class="btn btn-success"
                @click="activeUser(modalUser.id, 1)"
              >ยืนยัน</button>
              <button
                v-else
                class="btn btn-warning"
                @click="activeUser(modalUser.id, 0)"
              >ยกเลิกการยืนยัน</button>
              <button @click="deleteUser(modalUser.id)" class="btn btn-danger">ลบ</button>
              <button
                @click="modalHandle(modalUser.id)"
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
              >ยกเลิก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </LayoutAdmin>
</template>

<script>
import LayoutAdmin from "./LayoutAdmin.vue";

export default {
  components: {
    LayoutAdmin
  },
  data() {
    return {
      users: [],
      modal: false,
      modalUser: {}
    };
  },
  methods: {
    loadUsers() {
      axios.get("/admin/user").then(res => {
        console.log(res, "loadUser");
        this.users = res.data;
      });
    },
    activeUser(id, active) {
      axios.post("/admin/user", { id, active }).then(res => {
        console.log(res, "active");
        if (res.data === "success") {
          this.$notify("Updating..");
        } else {
          this.$notify("Error");
        }
        this.loadUsers();
        this.modal = false;
      });
    },
    deleteUser(id) {
      axios.delete(`/admin/user/${id}`).then(res => {
        console.log(res, "delete");
        if (res.data === "success") {
          this.$notify("Deleting..");
        } else {
          this.$notify("Error");
        }
        this.loadUsers();
        this.modal = false;
      });
    },
    modalHandle(index) {
      this.modalUser = this.users[index];
      this.modal = !this.modal;
    }
  },
  mounted() {
    this.loadUsers();
  }
};
</script>

<style scoped>
.modal {
  display: block !important; /* I added this to see the modal, you don't need this */
}

/* Important part */
.modal-dialog {
  width: 700px;
  overflow-y: initial !important;
}
.modal-body {
  height: 500px;
  overflow-y: auto;
}
</style>
