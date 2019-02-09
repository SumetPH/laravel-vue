<template>
  <Layout>
    <!-- Step1 -->
    <Step1></Step1>
    <!-- Step2 -->
    <Step2></Step2>
    <!-- Step3 -->
    <Step3></Step3>
    <!-- Report -->
    <Report></Report>
    <!-- Comment -->
    <Comment :who="who" :data="admin"></Comment>
  </Layout>
</template>

<script>
import { mapState } from "vuex";

import Layout from "../../components/Layout";
import Step1 from "./post/Step1.vue";
import Step2 from "./post/Step2.vue";
import Step3 from "./post/Step3.vue";
import Report from "./post/Report.vue";
import Comment from "../../components/Comment";

export default {
  components: {
    Layout,
    Step1,
    Step2,
    Step3,
    Report,
    Comment
  },
  computed: {
    ...mapState(["who", "admin"])
  }
};
</script>
