<template>
  <Layout>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card bg-secondary shadow">
          <div class="card-header">
            <h3 class="card-title mb-0 text-muted">เปลี่ยนรหัสผ่าน</h3>
          </div>
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-md-9">
                <form @submit.prevent="submit">
                  <div class="form-group">
                    <label for="old-password">รหัสผ่านปัจจุบัน</label>
                    <input
                      v-model="old_password"
                      class="form-control form-control-alternative"
                      type="password"
                    >
                  </div>
                  <div class="form-group">
                    <label for="new-password">รหัสผ่านใหม่</label>
                    <input
                      v-model="new_password"
                      class="form-control form-control-alternative"
                      type="password"
                    >
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">รหัสผ่านใหม่ (ยืนยัน)</label>
                    <input
                      v-model="confirm_password"
                      class="form-control form-control-alternative"
                      type="password"
                    >
                  </div>
                  <button
                    :disabled="new_password === '' || new_password !== confirm_password"
                    class="btn btn-primary"
                    type="submit"
                  >บันทึก</button>
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
import { mapState, mapActions } from 'vuex'
import Layout from '../../components/Layout'
export default {
  components: {
    Layout
  },
  data() {
    return {
      old_password: '',
      new_password: '',
      confirm_password: ''
    }
  },
  methods: {
    ...mapActions(['loading']),
    submit() {
      this.loading(true)
      axios
        .post(`/admin/changepassword`, {
          admin_id: this.admin.data.id,
          old_password: this.old_password,
          new_password: this.new_password
        })
        .then(res => {
          // consolee.log(res, "changepassword");
          if (res.data === 'success') {
            this.$notify({
              type: 'success',
              text: 'บันทึกข้อมูลเรียบร้อยแล้ว'
            })
            this.old_password = ''
            this.new_password = ''
            this.confirm_password = ''
          } else {
            this.$notify({
              type: 'error',
              text: 'มีข้อผิดผลาดในการบันทึกข้อมูล'
            })
          }
          this.loading(false)
        })
    }
  },
  computed: {
    ...mapState(['admin'])
  }
}
</script>
