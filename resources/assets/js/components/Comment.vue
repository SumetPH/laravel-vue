<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3 class="card-title text-muted mb-0">แสดงความคิดเห็น</h3>
        </div>
        <div class="card-body">
          <div v-for="(comm, index) in comments" :key="index">
            <span>{{ comm.msg }}</span>
            <p></p>
            <div class="d-flex justify-content-end">
              <div>
                <span
                  class="mr-1 btn btn-success btn-sm"
                  style="cursor: not-allowed"
                >โดย : {{ comm.username }}</span>
                <span
                  class="mr-1 btn btn-success btn-sm"
                  style="cursor: not-allowed"
                >เวลา : {{ comm.created_at }}</span>
              </div>
              <div>
                <button
                  @click="delComment(comm.id)"
                  v-if="comm.username === data.data.firstname"
                  type="submit"
                  class="mr-1 btn btn-danger btn-sm"
                  style="cursor: pointer;"
                >ลบ</button>
              </div>
            </div>
            <hr class="m-3">
          </div>
          <form @submit.prevent="submitComment">
            <div class="form-group">
              <textarea class="form-control" name="msg" rows="2" required v-model="msg"></textarea>
              <br>
              <button class="btn btn-primary" type="submit">แสดงความคิดเห็น</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  props: ["who", "data"],
  data() {
    return {
      comments: [],
      msg: ""
    };
  },
  methods: {
    loadComments() {
      axios.get(`/comment/${this.$route.params.id}`).then(res => {
        console.log(res, "comments");
        this.comments = res.data;
      });
    },
    submitComment() {
      axios
        .post(`/comment`, {
          post_id: this.$route.params.id,
          username: this.data.data.firstname,
          msg: this.msg
        })
        .then(res => {
          console.log(res, "submitComment");
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
          this.msg = "";
          this.loadComments();
        });
    },
    delComment(id) {
      let formData = new FormData();
      formData.append("_method", "delete");

      axios.post(`/comment/${id}`, formData).then(res => {
        console.log(res, "delComment");
        if (res.data === "success") {
          this.$notify({
            type: "success",
            text: "บันทึึึกข้อมูลเรียบร้อยแล้ว"
          });
        } else {
          this.$notify({
            type: "error",
            text: "มีข้อผิดผลาดในการบันทึกข้อมูล"
          });
        }
        this.loadComments();
      });
    }
  },
  mounted() {
    this.loadComments();
  }
};
</script>