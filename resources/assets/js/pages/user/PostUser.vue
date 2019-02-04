<template>
  <Layout>
    <!-- Step1 -->
    <Step1></Step1>
    <!-- Step2 -->
    <Step2></Step2>
    <!-- Step3 -->
    <Step3></Step3>
  </Layout>
</template>

<script>
import { mapState } from "vuex";

import Layout from "../../components/Layout";
import Step1 from "./post/Step1.vue";
import Step2 from "./post/Step2.vue";
import Step3 from "./post/Step3.vue";

export default {
  components: {
    Layout,
    Step1,
    Step2,
    Step3
  }
};
</script>