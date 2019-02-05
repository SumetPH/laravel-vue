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
                <form>
                  <div class="form-group">
                    <label for="old-password">รหัสผ่านปัจจุบัน</label>
                    <input
                      id="old_password"
                      name="old_password"
                      type="password"
                      class="form-control form-control-alternative"
                    >
                  </div>
                  <div class="form-group">
                    <label for="new-password">รหัสผ่านใหม่</label>
                    <input
                      id="new_password"
                      name="new_password"
                      type="password"
                      class="form-control form-control-alternative"
                    >
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">รหัสผ่านใหม่ (ยืนยัน)</label>
                    <input
                      id="confirm_password"
                      name="confirm_password"
                      type="password"
                      class="form-control form-control-alternative"
                    >
                  </div>
                  <button id="btn_submit" class="btn btn-primary" disabled>บันทึก</button>
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
export default {
  components: {
    Layout
  }
};
</script>
