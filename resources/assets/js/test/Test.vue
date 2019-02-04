<template>
  <file-pond name="file" ref="pond" label-idle="เลือกเอกสาร" :server="{process}"/>
</template>


<script>
import vueFilePond from "vue-filepond";

import "filepond/dist/filepond.min.css";

import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);

export default {
  components: {
    FilePond
  },
  props: ["url", "loadPostUser"],
  methods: {
    process(fieldName, file, metadata, load, error, progress, abort) {
      console.log(this.is_open);
      const formData = new FormData();
      formData.append("_method", "put");
      formData.append("file", file);

      // the request itself
      axios({
        method: "post",
        url: this.url,
        data: formData,
        onUploadProgress: e => {
          // updating progress indicator
          progress(e.lengthComputable, e.loaded, e.total);
        }
      }).then(res => {
        console.log(res);
        // passing the file id to FilePond
        load(res.data.id);
        this.loadPostUser();
      });
    }
  }
};
</script>

