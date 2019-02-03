<template>
  <div class="container">
    <div class="row">
      <div class="col-xl-4">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-header">
            <h4 class="card-title text-muted mb-0">คำร้องขอทั้งหมด</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <span class="h2 font-weight-bold mb-0">{{ posts.length }} รายการ</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="fas fa-chart-bar"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-header">
            <h4 class="card-title text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <span class="h2 font-weight-bold mb-0">{{ posts_checking.length }} รายการ</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  <i class="fas fa-percent"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card card-stats mb-4 mb-xl-0">
          <div class="card-header">
            <h4 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <span class="h2 font-weight-bold mb-0">{{ posts_checked.length }} รายการ</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                  <i class="fas fa-chart-pie"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    posts: {
      default: 0
    },
    posts_checking: {
      default: 0
    },
    posts_checked: {
      default: 0
    }
  }
};
</script>