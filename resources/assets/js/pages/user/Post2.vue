<template>
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            class="card-title mb-0"
            :style="post2 ? 'color: #2dce89' : 'color: #f5365c'"
          >ขั้นตอนที่ 2</h3>
        </div>
        <div class="card-body">
          <div class="col-md-9">
            <div class="form-group">
              <label for="file3">1. คำสั่งแต่งตั้งคณะอนุกรรมการประเมินผลการสอนเบื้องต้น</label>
              <br>เอกสาร :
              <a target="_blank" :href="'/files/' + post2.file3path">{{ post2.file3name }}</a>
            </div>
            <hr>
            <div class="form-group">
              <label for="file3">2. คำสั่งแต่งตั้งคณะกรรมการกลั่นกรองผลงานทางวิชาการ</label>
              <br>เอกสาร :
              <a target="_blank" :href="'/files/' + post2.file4path">{{ post2.file4name }}</a>
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
