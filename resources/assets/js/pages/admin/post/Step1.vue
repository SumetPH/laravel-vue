<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow" :style="post.step1 === '1' ? 'border: 3px solid #2dce89' : ''">
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
          <p>โดย : {{ post1.firstname }} {{ post1.lastname }}</p>
          <p>ตำแหน่งที่ร้องขอ : {{ post1.academic }}</p>
          <p>หัวข้อ : {{ post1.title }}</p>
          <p>รายละเอียด : {{ post1.description }}</p>
          <small>เวลา ​: {{post1.updated_at}}</small>
          <hr>
          <div class="col-md-9 form-group">
            <label for="file">ฟอร์มบันทึกข้อความ</label>
            <br>เอกสาร :
            <a target="_blank" :href="'/files/' + post1.file_path">{{ post1.file_name }}</a>
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
        <div class="card-footer">
          <h4
            v-if="post.step1 === '0'"
            class="card-title mb-0 text-center"
            style="color: #f5365c"
          >ยังไม่ผ่านการตรวจสอบ</h4>
          <h4 v-else class="card-title mb-0 text-center" style="color: #2dce89">ผ่านการตรวจสอบแล้ว</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  computed: {
    ...mapState({ post: "post", post1: "post1" })
  },
  methods: {
    ...mapActions(["loadPost", "loadPost1Admin"]),
    selectChange(e) {
      let formData = new FormData();
      formData.append("_method", "put");
      formData.append("step1", e.target.value);

      axios.post(`/admin/post/${this.$route.params.id}`, formData).then(res => {
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
        this.loadPost();
        this.loadPost1Admin();
      });
    }
  },
  mounted() {
    this.loadPost();
    this.loadPost1Admin();
  }
};
</script>
