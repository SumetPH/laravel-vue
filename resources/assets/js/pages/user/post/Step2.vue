<template>
  <div v-if="post.step1 === '1' && post.step2 === '1'" class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            v-if="post.step2 === '0'"
            class="card-title mb-0"
            style="color: #f5365c"
          >ขั้นตอนที่ 2 : กรุณารอเอกสารคำสั่งแต่งตั้ง</h3>
          <h3
            v-else
            class="card-title mb-0"
            style="color: #2dce89"
          >ขั้นตอนที่ 2 : เอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div v-for="(item, index) in post2" :key="index" class="col-md-9">
              <div class="form-group">
                <label>{{ item.title }}</label>
                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
              </div>
              <hr>
            </div>
          </div>
        </div>
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
    ...mapActions(["loadPost2User"])
  },
  mounted() {
    this.loadPost2User();
  }
};
</script>
