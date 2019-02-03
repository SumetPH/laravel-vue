<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            class="card-title mb-0"
            :style="post.status === 'ผ่านการตรวจสอบแล้ว' ? 'color: #2dce89' : 'color: #f5365c'"
          >ขั้นตอนที่ 1 : {{ post.status }}</h3>
        </div>
        <div class="card-body">
          <p>โดย : {{ post.firstname }} {{ post.lastname }}</p>
          <p>หัวข้อ : {{ post.title }}</p>
          <p>รายละเอียด : {{ post.description }}</p>
          <hr>
          <div class="col-md-9 form-group">
            <label for="file">ฟอร์มบันทึกข้อความ</label>
            <br>เอกสาร :
            <a target="_blank" :href="'/files/' + post.file">{{ post.filename }}</a>
          </div>
          <hr>

          <form class="col-md-9">
            <div class="form-group">
              <label for="status">ผลการประเมิน</label>
              <select class="form-control" name="status" @change="selectChange">
                <option
                  :selected="post.status === 'ยังไม่ได้รับการตรวจสอบ' ? 'selected' : ''"
                  value="ยังไม่ได้รับการตรวจสอบ"
                >ยังไม่ได้รับการตรวจสอบ</option>
                <option
                  :selected="post.status === 'ยังไม่ผ่านการตรวจสอบ' ? 'selected' : ''"
                  value="ยังไม่ผ่านการตรวจสอบ"
                >ยังไม่ผ่านการตรวจสอบ</option>
                <option
                  :selected="post.status === 'ผ่านการตรวจสอบแล้ว' ? 'selected' : ''"
                  value="ผ่านการตรวจสอบแล้ว"
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
        .put(`/admin/post/${this.$route.params.id}`, { status: e.target.value })
        .then(res => {
          console.log(res);
          this.$notify("Saving...");
          if (res.data === "success") {
            this.loadPostAdmin();
          }
        });
    }
  },
  mounted() {
    this.loadPostAdmin();
  }
};
</script>
