<template>
  <div>
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
            <p>หัวข้อ : {{ post.title }}</p>
            <p>รายละเอียด : {{ post.description }}</p>
            <hr>
            <div class="col-md-9 form-group">
              <label for>ฟอร์มบันทึกข้อความ</label>
              <br>เอกสาร :
              <a target="_blank" :href="'/files/' + post.file_path">{{post.file_name}}</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="post.step1 === '1' && post.step2 === '0'" class="row mt-5">
      <div class="col-md-12">
        <div class="alert alert-warning text-center">ขั้นตอนที่ 2 : กรุณารอเอกสารคำสั่งแต่งตั้ง</div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  computed: {
    ...mapState({ post: "post", post2: "post2" })
  },
  methods: {
    ...mapActions(["loadPostUser"])
  },
  mounted() {
    this.loadPostUser();
  }
};
</script>
