<template>
  <div>
    <layout>
      <!-- card -->
      <template slot="card">
        <Card :posts="posts" :posts_checking="posts_checking" :posts_checked="posts_checked"></Card>
      </template>
      <!-- Content -->
      <div class="row">
        <div class="col-xl-9 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header">
              <h3 class="card-title text-muted mb-0">คำร้องขอที่รอการตรวจสอบ</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th>หัวข้อ</th>
                      <th>ตำแหน่งที่ร้องขอ</th>
                      <th>เวลา</th>
                      <th>สถานะ</th>
                      <th>ลบ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in posts_checking" :key="index">
                      <td>
                        <router-link :to="'user/post/' + item.id">{{item.title}}</router-link>
                      </td>
                      <td>{{item.academic}}</td>
                      <td>{{ item.created_at }}</td>
                      <td>กำลังดำเนินการ</td>
                      <td>
                        <button
                          @click.prevent="deletePost(item.id)"
                          class="btn btn-danger btn-sm"
                        >ลบคำร้องขอ</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3">
          <div class="card shadow">
            <div class="card-header">
              <h4 class="card-title text-muted mb-0">สำหรับบุคลากร</h4>
            </div>

            <div class="card-body">
              <button
                @click="modalHandle"
                type="button"
                class="btn btn-primary btn-block animated pulse delay-1s"
              >เพิ่มคำร้องขอ</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header">
              <h3 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th>หัวข้อ</th>
                      <th>ตำแหน่งที่ร้องขอ</th>
                      <th>เวลา</th>
                      <th>สถานะ</th>
                      <th>ลบ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in posts_checked" :key="index">
                      <td>
                        <router-link :to="'/user/post/' + item.id">{{ item.title }}</router-link>
                      </td>
                      <td>{{item.academic}}</td>
                      <td>{{ item.created_at }}</td>
                      <td>ผ่านการตรวจสอบแล้ว</td>
                      <td>
                        <button
                          @click.prevent="deletePost(item.id)"
                          class="btn btn-danger btn-sm"
                        >ลบคำร้องขอ</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </layout>

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
            <form @submit.prevent="submit">
              <div class="modal-body bg-secondary">
                <div class="form-group">
                  <label class="control-label">ตำแหน่งที่ร้องขอ</label>
                  <select class="form-control form-control-alternative" v-model="academic">
                    <option value="ผู้ช่วยศาสตราจารย์">ผู้ช่วยศาสตราจารย์</option>
                    <option value="รองศาสตราจารย์">รองศาสตราจารย์</option>
                    <option value="ศาสตราจารย์">ศาสตราจารย์</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="title">หัวข้อ</label>
                  <input
                    type="text"
                    class="form-control form-control-alternative"
                    disabled
                    v-model="title"
                  >
                </div>
                <div class="form-group">
                  <label for="file">ฟอร์มบันทึกข้อความ</label>
                  <file-pond
                    required
                    name="file"
                    ref="pond"
                    label-idle="เลือกเอกสาร"
                    :server="{process,revert}"
                  />
                </div>
                <div class="form-group">
                  <label for="description">รายละเอียด</label>
                  <textarea
                    class="form-control form-control-alternative"
                    rows="3"
                    v-model="description"
                  ></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">บันทึก</button>
                <button
                  @click="modalHandle"
                  type="button"
                  class="btn btn-default"
                  data-dismiss="modal"
                >ยกเลิก</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Layout from "../../components/Layout";
import Card from "../../components/Card.vue";

export default {
  components: {
    Layout,
    Card
  },
  data() {
    return {
      user: JSON.parse(localStorage.getItem("user")),
      posts: [],
      posts_checking: [],
      posts_checked: [],
      academic: "ผู้ช่วยศาสตราจารย์",
      title: "ขอแต่งตั้งผู้ทรงคุณวุฒิภายนอก",
      description: "",
      file: "",
      modal: false
    };
  },
  methods: {
    changeFile(e) {
      this.file = e.target.files[0];
    },
    process(fieldName, file, metadata, load, error, progress, abort) {
      this.file = file;
      load();
    },
    revert(uniqueFileId, load, error) {
      this.file = "";
      load();
    },
    submit() {
      let formData = new FormData();
      formData.append("user_id", this.user.id);
      formData.append("academic", this.academic);
      formData.append("title", this.title);
      formData.append("description", this.description);
      formData.append("file", this.file);

      axios.post("/user/post", formData).then(res => {
        if (res.data === "success") {
          this.$notify({
            type: "success",
            text: "บันทึกข้อมูลเรียบร้อยแล้ว"
          });
          this.modal = false;
          this.loadData();
        } else {
          this.$notify({
            type: "error",
            text: "มีข้อผิดผลาดในการบันทึกข้อมูล"
          });
        }
      });
    },
    deletePost(id) {
      if (confirm("คุณต้องการลบคำร้องขอนี้ใช่หรือไม่")) {
        let formData = new FormData();
        formData.append("_method", "delete");

        axios.post(`/user/post/${id}`, formData).then(res => {
          console.log(res, "deletePost");
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
          this.loadData();
        });
      }
    },
    loadData() {
      axios.post("/user", { id: this.user.id }).then(res => {
        console.log(res);
        this.posts = res.data.posts;
        this.posts_checking = res.data.posts_checking;
        this.posts_checked = res.data.posts_checked;
      });
    },
    modalHandle() {
      this.modal = !this.modal;
    }
  },
  mounted() {
    if (this.user) {
      this.loadData();
    }
  }
};
</script>

<style scoped>
.modal {
  display: block !important; /* I added this to see the modal, you don't need this */
}

/* Important part */
.modal-dialog {
  width: 700px;
  overflow-y: initial !important;
}
.modal-body {
  height: 380px;
  overflow-y: auto;
}
</style>
