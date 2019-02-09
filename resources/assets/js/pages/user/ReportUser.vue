<template>
  <Layout>
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-secondary shadow">
          <div class="card-header">
            <h3 class="card-title mb-0 text-muted">รายงาน</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>หัวข้อ</th>
                    <th>ตำแหน่งที่ร้องขอ</th>
                    <th>เวลา</th>
                    <th>รายงาน</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in reports" :key="index">
                    <td v-if="item.report !== null">
                      <router-link :to="'/user/post/' + item.id">{{item.title}}</router-link>
                    </td>
                    <td v-if="item.report !== null">{{ item.academic }}</td>
                    <td v-if="item.report !== null">{{ item.created_at }}</td>
                    <td v-if="item.report !== null">{{ item.report }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

<script>
import { mapState } from "vuex";

import Layout from "../../components/Layout";

export default {
  components: {
    Layout
  },
  data() {
    return {
      reports: []
    };
  },
  methods: {
    loadReports() {
      axios.get(`/report/${this.user.data.id}`).then(res => {
        console.log(res, "loadReports");
        this.reports = res.data;
      });
    }
  },
  computed: {
    ...mapState(["user"])
  },
  mounted() {
    this.loadReports();
  }
};
</script>