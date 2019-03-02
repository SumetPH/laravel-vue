<template>
  <div v-if="post.step1 === '1'" class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow" :style="post.step2 === '1' ? 'border: 3px solid #2dce89' : ''">
        <div class="card-header">
          <h3
            v-if="post.step2 === '0'"
            class="card-title mb-0"
            style="color: #f5365c"
          >ขั้นตอนที่ 2 : กรุณาส่งเอกสารให้ครบตามหัวข้อที่กำหนด</h3>
          <h3
            v-else
            class="card-title mb-0"
            style="color: #2dce89"
          >ขั้นตอนที่ 2 : เอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div v-for="(item, index) in post2" :key="index" class="col-md-9">
              <div v-if="item.file_path != null" class="form-group">
                <label>{{ item.title }}</label>
                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
                <br>
                <small>เวลา ​: {{item.updated_at}}</small>
                <p></p>
                <!-- <button @click="item.file_path = null" class="btn btn-warning">แก้ไข</button> -->
                <button @click="item.file_path = null" class="btn btn-warning">แก้ไข</button>
              </div>

              <div v-else class="form-group">
                <label>{{ item.title }}</label>
                <file-pond
                  name="file"
                  ref="pond"
                  label-idle="เลือกเอกสาร"
                  :server="{process}"
                  @addfilestart="addfilestart(item.id,item.post_id)"
                />
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
import Test from "../../../test/Test";

export default {
  computed: {
    ...mapState({ post: "post", post2: "post2" })
  },
  components: {
    Test
  },
  data() {
    return {
      id: "",
      post_id: "",
      title: "",
      file: ""
    };
  },
  methods: {
    ...mapActions(["loadPost", "loadPost2Admin"]),
    addfilestart(id, post_id) {
      this.id = id;
      this.post_id = post_id;
    },
    process(fieldName, file, metadata, load, error, progress, abort) {
      const formData = new FormData();
      formData.append("_method", "put");
      formData.append("post_id", this.post_id);
      formData.append("file", file);

      // the request itself
      axios({
        method: "post",
        url: `/admin/post2/${this.id}`,
        data: formData,
        onUploadProgress: e => {
          // updating progress indicator
          progress(e.lengthComputable, e.loaded, e.total);
        }
      }).then(res => {
        console.log(res);
        // passing the file id to FilePond
        load("100");
        this.loadPost();
        this.loadPost2Admin();
      });
    }
  },
  mounted() {
    this.loadPost2Admin();
  }
};
</script>
