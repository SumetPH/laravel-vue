<template>
  <Layout>
    <!-- Step1 -->
    <Step1></Step1>
    <!-- Step2 -->
    <Step2 v-if="post.status === 'ผ่านการตรวจสอบแล้ว'"></Step2>
  </Layout>
</template>

<script>
import { mapState } from "vuex";

import Layout from "./LayoutUser";
import Step1 from "./post/Step1";
import Step2 from "./post/Step2";

export default {
  components: {
    Layout,
    Step1,
    Step2
  },
  computed: {
    ...mapState({
      post: "post"
    })
  }
};
</script>