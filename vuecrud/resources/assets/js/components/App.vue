<template lang="html">
<div class="container">
  <transition name="fade">
    <router-view></router-view>
  </transition>
</div>
</template>

<script>
export default {
  mounted(){
    console.log('Component mounted.')
  }
}
</script>

<style lang="css">
</style>
