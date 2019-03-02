	<template>
  <div v-if="post.step1 === '1' && post.step2 === '1' " class="row">
    <div class="col-md-12">
      <div class="card shadow" :style="post.overall === '1' ? 'border: 3px solid #2dce89' : ''">
        <div class="card-header">
          <h3
            v-if="post.step3 === '0'"
            class="card-title mb-0"
            style="color: #f5365c"
          >ขั้นตอนที่ 3 : กรุณาส่งเอกสารให้ครบตามหัวข้อที่กำหนด</h3>
          <h3
            v-else
            class="card-title mb-0"
            :style="post.overall === '1' ? 'color : #2dce89' : 'color: #fb6340'"
          >ขั้นตอนที่ 3 : เอกสารประกอบการเสนอขอกำหนดตำแหน่งทางวิชาการ</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div v-for="(item, index) in post3" :key="index" class="col-md-9">
              <div v-if="item.file_path != null" class="form-group">
                <i v-if="item.status === '1'" class="far fa-check-circle text-green"></i>
                <label>{{ item.title }}</label>
                <p>
                  เอกสาร :
                  <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
                </p>
                <p
                  :style="item.status === '0' ? 'color: #fb6340' : 'color : #2dce89'"
                  for="status"
                >ผลการประเมิน : {{ item.status === '0' ? 'ยังไม่ผ่านการตรวจสอบ' : 'ผ่านการตรวจสอบแล้ว' }}</p>
                <small>เวลา ​: {{item.updated_at}}</small>
                <p></p>
                <button
                  v-if="item.status === '0'"
                  @click="item.file_path = null"
                  class="btn btn-warning"
                >แก้ไข</button>
              </div>

              <div v-else class="form-group">
                <label>{{ item.title }}</label>
                <file-pond
                  @addfilestart="addfilestart(item.id,item.post_id)"
                  :server="{process}"
                  name="file"
                  ref="pond"
                  label-idle="เลือกเอกสาร"
                />
              </div>
              <hr>
            </div>
          </div>
        </div>

        <div v-if="post.overall === '1'" class="card-footer">
          <h4
            class="card-title mb-0 text-center"
            :style="post.overall === '1' ? 'color : #2dce89' : 'color: #fb6340'"
          >คำร้องขอนี้ผ่านการตรวจสอบเรียบร้อยแล้ว</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  data() {
    return {
      id: '',
      post_id: '',
      title: '',
      file: ''
    }
  },
  methods: {
    ...mapActions(['loadPost', 'loadPost3User']),
    addfilestart(id, post_id) {
      this.id = id
      this.post_id = post_id
    },
    process(fieldName, file, metadata, load, error, progress, abort) {
      const formData = new FormData()
      formData.append('_method', 'put')
      formData.append('post_id', this.post_id)
      formData.append('file', file)

      // the request itself
      axios({
        method: 'post',
        url: `/user/post3/${this.id}`,
        data: formData,
        onUploadProgress: e => {
          // updating progress indicator
          progress(e.lengthComputable, e.loaded, e.total)
        }
      }).then(res => {
        // consolele.log(res)
        // passing the file id to FilePond
        load('100')
        this.loadPost()
        this.loadPost3User()
      })
    }
  },
  computed: {
    ...mapState({ post: 'post', post3: 'post3' })
  },
  mounted() {
    this.loadPost3User()
  }
}
</script>
