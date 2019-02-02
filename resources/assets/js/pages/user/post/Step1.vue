<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header">
          <h3
            class="card-title mb-0"
            :style="post.status === 'ผ่านการตรวจสอบแล้ว' ? 'color: #2dce89' : 'color: #f5365c'"
          >ขั้นตอนที่ 1 : {{post.status}}</h3>
        </div>
        <div class="card-body">
          <p>หัวข้อ : {{ post.title }}</p>
          <p>รายละเอียด : {{ post.description }}</p>
          <hr>
          <div class="col-md-9 form-group">
            <label for>ฟอร์มบันทึกข้อความ</label>
            <br>เอกสาร :
            <a target="_blank" :href="'/files/' + post.file">{{post.filename}}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"]
};
</script>
