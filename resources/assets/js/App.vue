<template>
  <div>
    <!-- <transition name="fade"> -->
    <router-view></router-view>
    <!-- </transition> -->
    <notifications position="bottom right"/>
  </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
</style>

<style>
.vue-notification {
  padding: 10px;
  margin: 10px;

  font-size: 14px;

  color: #ffffff;
  background: #44a4fc;
  border-left: 5px solid #187fe7;

  &.warn {
    background: #ffb648;
    border-left-color: #f48a06;
  }

  &.error {
    background: #e54d42;
    border-left-color: #b82e24;
  }

  &.success {
    background: #68cd86;
    border-left-color: #42a85f;
  }
}
</style>


<script>
export default {};
</script>