<template>
  <layout>
    <!-- card -->
    <template slot="card">
      <Card :posts="posts" :posts_checking="posts_checking" :posts_checked="posts_checked"></Card>
    </template>
    <!-- Content -->
    <div class="row">
      <div class="col-md-9">
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
                    <th>เวลา</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts_checking" :key="index">
                    <td>
                      <router-link :to="'/admin/post/' + item.id">{{ item.title }}</router-link>
                    </td>
                    <td>
                      {{item.firstname}}
                      <!-- <a href="/admin/user/{{$post->user->id}}">{{ $post->user->firstname }}</a> -->
                    </td>
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
                    <th>เวลา</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(item, index) in posts_checked" :key="index">
                    <td>
                      <router-link :to="'/admin/post/' + item.id">{{ item.title }}</router-link>
                    </td>
                    <td>
                      {{item.firstname}}
                      <!-- <a href="/admin/user/{{$post->user->id}}">{{ $post->user->firstname }}</a> -->
                    </td>
                    <td>{{ item.created_at }}</td>
                    <td>ผ่านการตรวจสอบแล้ว</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-header">
              <h4 class="card-title text-muted mb-0">ผู้ใช้งานที่ได้รับการยืนยันแล้ว</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <span class="h2 font-weight-bold mb-0">{{ $users_confirm->count() }} คน</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-stats mt-4 mb-4 mb-xl-0">
            <div class="card-header">
              <h4 class="card-title text-muted mb-0">ผู้ใช้งานที่ยังไม่ได้รับการยืนยัน</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <span class="h2 font-weight-bold mb-0">{{ $users_new->count() }} คน</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="fas fa-percent"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>-->
    </div>
  </layout>
</template>


<script>
import Layout from "./LayoutAdmin.vue";
import Card from "../../components/Card.vue";

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
    };
  },
  methods: {
    loadData() {
      axios.get("/admin").then(res => {
        console.log(res);
        this.posts = res.data.posts;
        this.posts_checking = res.data.posts_checking;
        this.posts_checked = res.data.posts_checked;
      });
    }
  },
  mounted() {
    this.loadData();
  }
};
</script>

