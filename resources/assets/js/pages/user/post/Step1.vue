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
            <p>ตำแหน่งที่ร้องขอ : {{ post1.academic }}</p>
            <p>หัวข้อ : {{ post1.title }}</p>
            <p>รายละเอียด : {{ post1.description }}</p>
            <small>เวลา ​: {{post1.updated_at}}</small>
            <hr>
            <div class="row justify-content-center">
              <div class="col-md-12">
                <label>ฟอร์มบันทึกข้อความ</label>
                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + post1.file_path">{{post1.file_name}}</a>
                <p></p>
                <button v-if="post.step1 === '0'" @click="modalHandle" class="btn btn-warning">แก้ไข</button>
              </div>
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

    <!-- Modal -->
    <div class="row">
      <div
        v-if="modal"
        class="modal animated slideInDown"
        style="display: block"
        id="myModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
      >
        <div class="modal-dialog" role="document" data-show="true">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">คำร้องขอ</h4>
              <button
                @click="modalHandle"
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                :disabled="isSubmit"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-secondary">
              <div class="form-group">
                <label for="description">รายละเอียด</label>
                <textarea
                  class="form-control form-control-alternative"
                  rows="5"
                  v-model="description"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="file">ฟอร์มบันทึกข้อความ</label>
                <br>
                <button v-if="!file" @click="file = true" class="btn btn-warning">แก้ไขเอกสาร</button>
                <file-pond
                  v-if="file"
                  label-idle="เลือกเอกสาร"
                  @addfile="onaddfile"
                  :server="{process,revert}"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                @click="updatePost"
                type="submit"
                class="btn btn-primary btn-icon"
                :disabled="isSubmit"
              >
                <span v-if="isSubmit" class="btn-inner--icon">
                  <i class="fas fa-spinner"></i>
                </span>
                <span v-else class="btn-inner--text">บันทึก</span>
              </button>
              <button
                @click="modalHandle"
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
                :disabled="isSubmit"
              >ยกเลิก</button>
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
      isSubmit: false,
      modal: false,
      description: "",
      file: false
    };
  },
  computed: {
    ...mapState({ post: "post", post1: "post1", post2: "post2" })
  },
  methods: {
    ...mapActions(["loadPost", "loadPost1User"]),
    modalHandle() {
      this.description = this.post1.description;
      this.modal = !this.modal;
    },
    onaddfile() {
      this.isSubmit = true;
    },
    process(fieldName, file, metadata, load, error, progress, abort) {
      this.file = file;
      load();
      this.isSubmit = false;
    },
    revert(uniqueFileId, load, error) {
      this.file = false;
      load();
    },
    updatePost() {
      let formData = new FormData();
      formData.append("_method", "put");
      formData.append("file", this.file);
      if (this.description === null) {
        formData.append("description", "");
      } else {
        formData.append("description", this.description);
      }

      axios.post(`/user/post/${this.post.id}`, formData).then(res => {
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
        this.loadPost1User();
        this.modal = false;
        this.file = false;
      });
    }
  },
  mounted() {
    this.loadPost();
    this.loadPost1User();
  }
};
</script>
