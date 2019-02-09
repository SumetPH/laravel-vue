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
                    <td>
                      <router-link :to="'/user/post/' + item.id">{{item.title}}</router-link>
                    </td>
                    <td>{{ item.academic }}</td>
                    <td>{{ item.created_at }}</td>
                    <td>{{ item.report }}</td>
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
  computed: {
    ...mapState(["reports"])
  }
};
</script>