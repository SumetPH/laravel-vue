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
              <label>ฟอร์มบันทึกข้อความ</label>
              <br>เอกสาร :
              <a target="_blank" :href="'/files/' + post.file_path">{{post.file_name}}</a>
              <p></p>
              <button v-if="post.step1 === '0'" @click="modalHandle" class="btn btn-warning">แก้ไข</button>
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
              <button
                @click="modalHandle"
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">คำร้องขอ</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="description">รายละเอียด</label>
                <textarea class="form-control" rows="5" v-model="description"></textarea>
              </div>
              <div class="form-group">
                <label for="file">ฟอร์มบันทึกข้อความ</label>
                <br>
                <button v-if="!file" @click="file = true" class="btn btn-warning">แก้ไขเอกสาร</button>
                <input v-if="file" class="form-control" type="file" @change="changeFile">
              </div>
            </div>
            <div class="modal-footer">
              <button @click="updatePost" class="btn btn-primary">บันทึก</button>
              <button
                @click="modalHandle"
                type="button"
                class="btn btn-default"
                data-dismiss="modal"
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
      modal: false,
      description: "",
      file: false
    };
  },
  computed: {
    ...mapState({ post: "post", post2: "post2" })
  },
  methods: {
    ...mapActions(["loadPostUser"]),
    modalHandle() {
      this.description = this.post.description;
      this.modal = !this.modal;
    },
    changeFile(e) {
      this.file = e.target.files[0];
    },
    updatePost() {
      let formData = new FormData();
      formData.append("_method", "put");
      formData.append("description", this.description);
      formData.append("file", this.file);

      axios.post(`/user/post/${this.post.id}`, formData).then(res => {
        if (res.data === "success") {
          this.$notify("Updating..");
        } else {
          this.$notify("Error");
        }
        this.loadPostUser();
        this.modal = false;
      });
    }
  },
  mounted() {
    this.loadPostUser();
  }
};
</script>
