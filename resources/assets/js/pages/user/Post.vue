<template>
  <Layout v-if="post">
    <!-- Step1 -->
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h3
              class="card-title mb-0"
              :style="post.status === 'ผ่านการตรวจสอบแล้ว' ? 'color: #2dce89' : 'color: #f5365c'"
            >ขั้นตอนที่ 1 : {{post.status}}</h3>
          </div>
          <div class="card-body">
            <p>หัวข้อ : {{ post.title }}</p>
            <p>รายละเอียด : {{ post.description }}</p>
            <hr>
            <div class="col-md-9 form-group">
              <label for>ฟอร์มบันทึกข้อความ</label>
              <br>เอกสาร :
              <a target="_blank" :href="'/files/' + post.file">{{post.filename}}</a>
            </div>
            <!-- @if ($post->status != 'ผ่านการตรวจสอบแล้ว')
                    <a href="/user/post/{{ $post->id }}/edit" class="btn btn-warning m-3">แก้ไข</a>
            @endif-->
          </div>
        </div>
      </div>
    </div>

    <!-- Step2 -->
    <Post2 v-if="post.status === 'ผ่านการตรวจสอบแล้ว'" :post2="post2"></Post2>
  </Layout>
</template>

<script>
import Layout from "./Layout.vue";
import Post2 from "./Post2";

export default {
  components: {
    Layout,
    Post2
  },
  data() {
    return {
      post: false,
      post2: false,
      comments: []
    };
  },
  methods: {
    loadData() {
      axios.get("/user/post/" + this.$route.params.id).then(res => {
        console.log(res);
        this.post = res.data.post;
        this.comments = res.data.comments;
      });

      axios.get("/user/post2/" + this.$route.params.id).then(res => {
        console.log(res);
        this.post2 = res.data.post2;
      });
    }
  },
  created() {
    this.loadData();
  }
};
</script>