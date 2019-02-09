<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            v-if="post.step1 === '0'"
            class="card-title mb-0"
            style="color: #f5365c"
          >ขั้นตอนที่ 1 : ยังไม่ผ่านการตรวจสอบ</h3>
          <h3
            v-else
            class="card-title mb-0"
            style="color: #2dce89"
          >ขั้นตอนที่ 1 : ผ่านการตรวจสอบแล้ว</h3>
        </div>
        <div class="card-body">
          <p>โดย : {{ post.firstname }} {{ post.lastname }}</p>
          <p>ตำแหน่งที่ร้องขอ: {{ post.academic }}</p>
          <p>หัวข้อ : {{ post.title }}</p>
          <p>รายละเอียด : {{ post.description }}</p>
          <small>เวลา ​: {{post.updated_at}}</small>
          <hr>
          <div class="col-md-9 form-group">
            <label for="file">ฟอร์มบันทึกข้อความ</label>
            <br>เอกสาร :
            <a target="_blank" :href="'/files/' + post.file_path">{{ post.file_name }}</a>
          </div>
          <hr>

          <form class="col-md-9">
            <div class="form-group">
              <label for="status">ผลการประเมิน</label>
              <select class="form-control" name="status" @change="selectChange">
                <option
                  :selected="post.step1 === '0' ? 'selected' : ''"
                  value="0"
                >ยังไม่ผ่านการตรวจสอบ</option>
                <option
                  :selected="post.step1 === '1' ? 'selected' : ''"
                  value="1"
                >ผ่านการตรวจสอบแล้ว</option>
              </select>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  computed: {
    ...mapState({ post: "post" })
  },
  methods: {
    ...mapActions(["loadPostAdmin"]),
    selectChange(e) {
      axios
        .put(`/admin/post/${this.$route.params.id}`, { step1: e.target.value })
        .then(res => {
          console.log(res);
          if (res.data === "success") {
            this.$notify({
              type: "success",
              text: "บันทึกข้อมูลเรียบร้อยแล้ว"
            });
          } else {
            this.$notify({
              type: "error",
              text: "มีข้อผิดผลาดในการบันทึกข้อมูล"
            });
          }
          this.loadPostAdmin();
        });
    }
  },
  mounted() {
    this.loadPostAdmin();
  }
};
</script>
