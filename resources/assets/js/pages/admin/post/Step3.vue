<template>
  <div>
    <div v-if="post.step1 === '1' && post.step2 === '1' && post.step3 === '1'" class="row mt-5">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h3
              class="card-title mb-0"
              :style="post.step3check === '1' ? 'color : #2dce89' : 'color: #fb6340'"
            >ขั้นตอนที่ 3 : เอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div v-for="(item, index) in post3" :key="index" class="col-md-9">
                <div class="form-group">
                  <i v-if="item.status === '1'" class="ni ni-check-bold text-green"></i>
                  <!-- <i v-else class="ni ni-fat-remove text-red"></i> -->
                  <label>{{ item.title }}</label>
                  <br>เอกสาร :
                  <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
                  <br>
                  <small>เวลา ​: {{item.updated_at}}</small>
                </div>
                <div class="form-group">
                  <label for="status">ผลการประเมิน</label>
                  <select
                    class="form-control"
                    name="status"
                    @change="e => update(item.id, item.post_id, e)"
                  >
                    <option
                      :selected="item.status === '0' ? 'selected' : ''"
                      value="0"
                    >ยังไม่ผ่านการตรวจสอบ</option>
                    <option
                      :selected="item.status === '1' ? 'selected' : ''"
                      value="1"
                    >ผ่านการตรวจสอบแล้ว</option>
                  </select>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-if="post.step1 === '1' && post.step2 === '1' && post.step3 === '0'" class="row mt-5">
      <div class="col-md-12">
        <div
          class="alert alert-warning text-center"
        >ขั้นตอนที่ 3 : กรุณารอเอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  methods: {
    ...mapActions(["loadPostAdmin", "loadPost3Admin"]),
    update(id, post_id, e) {
      let formData = new FormData();
      formData.append("id", id);
      formData.append("post_id", post_id);
      formData.append("status", e.target.value);

      axios.post(`/admin/post3`, formData).then(res => {
        console.log(res);
        if (res.data === "success") {
          this.$notify("Updating..");
          this.loadPostAdmin();
          this.loadPost3Admin();
        }
      });
    }
  },
  computed: {
    ...mapState({ post: "post", post3: "post3" })
  },
  mounted() {
    this.loadPost3Admin();
  }
};
</script>
