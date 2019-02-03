	<template>
  <div v-if="post.step1 === '1' && post.step2 === '1' " class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            v-if="post.step3 === '0'"
            class="card-title mb-0"
            style="color: #f5365c"
          >ขั้นตอนที่ 3 : กรุณาส่งเอกสารให้ครบตามหัวข้อที่กำหนด</h3>
          <h3
            v-else
            class="card-title mb-0"
            style="color: #2dce89"
          >ขั้นตอนที่ 3 : เอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div v-for="(item, index) in post3" :key="index" class="col-md-9">
              <div v-if="item.file_path != null" class="form-group">
                <i v-if="item.status === '1'" class="ni ni-check-bold text-green"></i>
                <!-- <i v-else class="ni ni-fat-remove text-red"></i> -->
                <label>{{ item.title }}</label>
                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
                <p></p>
                <button
                  v-if="item.status === '0'"
                  @click="item.file_path = null"
                  class="btn btn-warning"
                >แก้ไข</button>
              </div>

              <div v-else class="form-group">
                <label>{{ item.title }}</label>
                <input
                  type="file"
                  class="form-control"
                  @change="(e) => update(item.id, item.post_id, e.target.files[0])"
                >
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
  data() {
    return {
      title: "",
      file: ""
    };
  },
  methods: {
    ...mapActions(["loadPostUser", "loadPost3User"]),
    update(id, post_id, file) {
      let formData = new FormData();
      formData.append("id", id);
      formData.append("post_id", post_id);
      formData.append("file", file);

      axios.post(`/user/post3`, formData).then(res => {
        console.log(res);
        this.$notify("Update...");
        if (res.data === "success") {
          this.loadPostUser();
          this.loadPost3User();
        }
      });
    }
  },
  computed: {
    ...mapState({ post: "post", post3: "post3" })
  },
  mounted() {
    this.loadPost3User();
  }
};
</script>
