<template>
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            class="card-title mb-0"
            :style="post2[0].file_name && post2[1].file_name ? 'color : #2dce89' :'color: #f5365c'"
          >ขั้นตอนที่ 2</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div v-for="(item, index) in post2" :key="index" class="col-md-9">
              <div v-if="item.file_path != null" class="form-group">
                <label>{{ item.title }}</label>

                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
                <p></p>
                <button @click="item.file_path = null" class="btn btn-warning">แก้ไข</button>
              </div>

              <div v-else class="form-group">
                <label>{{ item.title }}</label>
                <input
                  type="file"
                  class="form-control"
                  @change="(e) => update(item.id,e.target.files[0])"
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
  computed: {
    ...mapState({ post2: "post2" })
  },

  data() {
    return {
      title: "",
      file: "",
      formSchema: [
        {
          title: "1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น"
        },
        {
          title: "2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ"
        }
      ]
    };
  },
  methods: {
    ...mapActions(["loadPost2Admin"]),
    update(id, file) {
      let formData = new FormData();
      formData.append("id", id);
      formData.append("file", file);

      axios.post(`/admin/post2`, formData).then(res => {
        console.log(res);
        this.$notify("Update...");
        if (res.data === "success") {
          this.loadPost2Admin(this.$route.params.id);
        }
      });
    }
  },
  mounted() {
    this.loadPost2Admin(this.$route.params.id);
  }
};
</script>
