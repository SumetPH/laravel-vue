<template>
  <div
    :class="[
        'header pb-8 pt-5 pt-md-8',
        bgColor ? 'bg-gradient-' + bgColor : 'bg-gradient-primary'
    ]"
  >
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    bgColor: String
  }
};
</script>
