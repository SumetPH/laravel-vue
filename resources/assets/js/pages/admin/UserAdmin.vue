<template>
  <Layout>
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
                      <span v-else>ได้รับการอนุมัติแล้ว</span>
                    </td>
                    <td class="p-2">
                      <button
                        v-if="user.active === '0'"
                        @click="activeUser(user.id, 1)"
                        class="btn btn-success"
                      >ยืนยัน</button>
                      <button
                        v-else
                        @click="activeUser(user.id, 0)"
                        class="btn btn-warning"
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
              <h4 class="modal-title" id="myModalLabel">ข้อมูลผู้ใช้งาน</h4>
              <button
                @click="modalHandle"
                class="close"
                type="button"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-secondary">
              <div class="row justify-content-center">
                <div>
                  <img
                    :src="modalUser.image ? '/files/' + modalUser.image : '/files/image/profile.png'"
                    width="180px"
                    class="rounded-circle"
                  >
                </div>

                <div class="col-md-9 mt-4">
                  <div class="form-group">
                    <label class="control-label">ตำแหน่งทางวิชาการ</label>
                    <input
                      :value="modalUser.academic"
                      class="form-control form-control-alternative"
                      type="text"
                      name="academic"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="firstname" class="control-label">ชื่อ</label>
                    <input
                      :value="modalUser.firstname"
                      class="form-control form-control-alternative"
                      type="text"
                      name="firstname"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="control-label">นามสกุล</label>
                    <input
                      :value="modalUser.lastname"
                      class="form-control form-control-alternative"
                      type="text"
                      name="lastname"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="email" class="control-label">อีเมล</label>
                    <input
                      :value="modalUser.email"
                      class="form-control form-control-alternative"
                      type="text"
                      name="email"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="education" class="control-label">วุฒิ</label>
                    <input
                      :value="modalUser.education"
                      class="form-control form-control-alternative"
                      type="text"
                      name="education"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="position" class="control-label">ตำแหน่ง</label>
                    <input
                      :value="modalUser.position"
                      class="form-control form-control-alternative"
                      type="text"
                      name="position"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="branch" class="control-label">สาขา</label>
                    <input
                      :value="modalUser.branch"
                      class="form-control form-control-alternative"
                      type="text"
                      name="branch"
                      disabled
                    >
                  </div>

                  <div class="form-group">
                    <label for="faculty" class="control-label">คณะ</label>
                    <input
                      :value="modalUser.faculty"
                      class="form-control form-control-alternative"
                      type="text"
                      name="faculty"
                      disabled
                    >
                  </div>
                  <div class="form-group">
                    <label for="university" class="control-label">มหาวิทยาลัย</label>
                    <input
                      :value="modalUser.university"
                      class="form-control form-control-alternative"
                      type="text"
                      name="university"
                      disabled
                    >
                  </div>
                  <div class="form-group">
                    <label for="campus" class="control-label">วิทยาเขต</label>
                    <input
                      :value="modalUser.campus"
                      class="form-control form-control-alternative"
                      type="text"
                      name="campus"
                      disabled
                    >
                  </div>
                  <div class="form-group">
                    <label for="number" class="control-label">เบอร์โทรศัพท์</label>
                    <input
                      :value="modalUser.number"
                      class="form-control form-control-alternative"
                      type="text"
                      name="number"
                      disabled
                    >
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                v-if="modalUser.active === '0'"
                @click="activeUser(modalUser.id, 1)"
                class="btn btn-success"
              >ยืนยัน</button>
              <button
                v-else
                @click="activeUser(modalUser.id, 0)"
                class="btn btn-warning"
              >ยกเลิกการยืนยัน</button>
              <button @click="deleteUser(modalUser.id)" class="btn btn-danger">ลบ</button>
              <button
                @click="modalHandle(modalUser.id)"
                class="btn btn-default"
                type="button"
                data-dismiss="modal"
              >ยกเลิก</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import { mapActions } from 'vuex'
import Layout from '../../components/Layout'

export default {
  components: {
    Layout
  },
  data() {
    return {
      users: [],
      modal: false,
      modalUser: {}
    }
  },
  methods: {
    ...mapActions(['loading']),
    loadUsers() {
      axios.get('/admin/user').then(res => {
        // consolee.log(res, "loadUser");
        this.users = res.data
      })
    },
    activeUser(id, active) {
      this.loading(true)
      axios.post('/admin/user', { id, active }).then(res => {
        // consolee.log(res, "active");
        if (res.data === 'success') {
          this.$notify({
            type: 'success',
            text: 'บันทึกข้อมูลเรียบร้อยแล้ว'
          })
        } else {
          this.$notify({
            type: 'error',
            text: 'มีข้อผิดผลาดในการบันทึกข้อมูล'
          })
        }
        this.loading(false)
        this.loadUsers()
        this.modal = false
      })
    },
    deleteUser(id) {
      if (confirm('คุณต้องการลบผู้ใช้งานใช่หรือไม่')) {
        this.loading(true)
        axios.delete(`/admin/user/${id}`).then(res => {
          // consolee.log(res, "delete");
          if (res.data === 'success') {
            this.$notify({
              type: 'success',
              text: 'บันทึกข้อมูลเรียบร้อยแล้ว'
            })
          } else {
            this.$notify({
              type: 'error',
              text: 'มีข้อผิดผลาดในการบันทึกข้อมูล'
            })
          }
          this.loading(false)
          this.loadUsers()
          this.modal = false
        })
      }
    },
    modalHandle(index) {
      this.modalUser = this.users[index]
      this.modal = !this.modal
    }
  },
  mounted() {
    this.loadUsers()
  }
}
</script>

<style scoped>
.modal {
  display: block !important; /* I added this to see the modal, you don't need this */
}

/* Important part */
.modal-dialog {
  overflow-y: initial !important;
}
.modal-body {
  height: 390px;
  overflow-y: auto;
}
</style>
