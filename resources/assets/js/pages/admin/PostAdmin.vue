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

import Layout from "./LayoutAdmin";
import Step1 from "./post/Step1";
import Step2 from "./post/Step2";
import Step3 from "./post/Step3";

export default {
  components: {
    Layout,
    Step1,
    Step2,
    Step3
  }
};
</script>
