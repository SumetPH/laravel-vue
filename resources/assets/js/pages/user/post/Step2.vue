<template>
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            class="card-title mb-0"
            :style="post2[0].file_name && post2[1].file_name ? 'color : #2dce89' :'color: #f5365c'"
          >ขั้นตอนที่ 2</h3>
        </div>
        <div class="card-body">
          <div v-if="post2[0].file_name && post2[1].file_name" class="row">
            <div v-for="(item, index) in post2" :key="index" class="col-md-9">
              <div class="form-group">
                <label>{{ item.title }}</label>
                <br>เอกสาร :
                <a target="_blank" :href="'/files/' + item.file_path">{{ item.file_name }}</a>
              </div>
              <hr>
            </div>
          </div>
          <div v-else class="row">
            <div class="col-md-12">
              <div class="alert alert-warning text-center">Waiting.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post2"]
};
</script>
