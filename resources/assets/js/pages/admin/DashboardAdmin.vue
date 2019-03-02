<template>
  <layout>
    <!-- card -->
    <template slot="card">
      <Card :posts="posts" :posts_checking="posts_checking" :posts_checked="posts_checked"></Card>
    </template>
    <!-- Content -->
    <div class="row justify-content-center">
      <div class="col-md-10">
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
                    <th>ผู้ส่ง</th>
                    <th>ตำแหน่งที่ร้องขอ</th>
                    <th>เวลา</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts_checking" :key="index">
                    <td>
                      <router-link :to="'/admin/post/' + item.id">{{ item.title }}</router-link>
                    </td>
                    <td>{{item.firstname}}</td>
                    <td>{{item.academic}}</td>
                    <td>{{ item.created_at }}</td>
                    <td>กำลังดำเนินการ</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="card shadow mt-5">
          <div class="card-header">
            <h3 class="card-title text-muted mb-0">คำร้องขอที่ผ่านการตรวจสอบแล้ว</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>หัวข้อ</th>
                    <th>ผู้ส่ง</th>
                    <th>ตำแหน่งที่ร้องขอ</th>
                    <th>เวลา</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts_checked" :key="index">
                    <td>
                      <router-link :to="'/admin/post/' + item.id">{{ item.title }}</router-link>
                    </td>
                    <td>{{item.firstname}}</td>
                    <td>{{item.academic}}</td>
                    <td>{{ item.created_at }}</td>
                    <td>ผ่านการตรวจสอบแล้ว</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </layout>
</template>


<script>
import Layout from '../../components/Layout'
import Card from '../../components/Card.vue'

export default {
  components: {
    Layout,
    Card
  },
  data() {
    return {
      posts: {},
      posts_checking: [],
      posts_checked: []
    }
  },
  methods: {
    loadData() {
      axios.get('/admin').then(res => {
        // console.log(res);
        this.posts = res.data.posts
        this.posts_checking = res.data.posts_checking
        this.posts_checked = res.data.posts_checked
      })
    }
  },
  mounted() {
    this.loadData()
  }
}
</script>

