<template>
  <Layout>
    <!-- Step1 -->
    <Step1 :post="post" :load-post="loadPost"></Step1>
    <!-- Step2 -->
    <Step2 :post2="post2" :load-post2="loadPost2" v-if="post.status === 'ผ่านการตรวจสอบแล้ว'"></Step2>
  </Layout>
</template>

<script>
import Layout from "./LayoutUser";
import Step1 from "./post/Step1";
import Step2 from "./post/Step2";

export default {
  components: {
    Layout,
    Step1,
    Step2
  },
  data() {
    return {
      post: {},
      post2: [{ file_path: null }, { file_path: null }]
    };
  },
  methods: {
    loadPost() {
      axios.get("/user/post/" + this.$route.params.id).then(res => {
        console.log(res, "user-post");
        this.post = res.data.post;
        //   this.comments = res.data.comments;
      });
    },
    loadPost2() {
      axios.get("/user/post2/" + this.$route.params.id).then(res => {
        console.log(res, "user-post2");
        this.post2 = res.data.post2;
      });
    }
  },
  mounted() {
    this.loadPost();
    this.loadPost2();
  }
};
</script>