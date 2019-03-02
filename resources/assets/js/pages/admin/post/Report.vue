<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3 class="card-title text-muted mb-0">รายงาน</h3>
        </div>
        <div class="card-body">
          <form @submit.prevent="saveReport">
            <div class="row">
              <div class="col-md-10">
                <input v-model="post.report" class="form-control" type="text" placeholder="รายงาน">
              </div>
              <div class="col-md-2 text-center">
                <button type="submit" class="btn btn-success">บันทีก</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: ''
    }
  },
  methods: {
    loadReport() {
      axios.get(`/report/${this.$route.params.id}/edit`).then(res => {
        // consoleole.log(res, 'report')
        this.post = res.data
      })
    },
    saveReport() {
      let formData = new FormData()
      formData.append('_method', 'put')
      formData.append('report', this.post.report)

      axios.post(`/report/${this.$route.params.id}`, formData).then(res => {
        // consoleole.log(res, 'saveReport')
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
        this.loadReport()
      })
    }
  },
  mounted() {
    this.loadReport()
  }
}
</script>


