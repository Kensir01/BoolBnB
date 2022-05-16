<template>
  <div class="contenitore_debug">
    <keep-alive include="AdvancedSearch, Home" max="5">
      <router-view/>
    </keep-alive>
  </div>
</template>

<script>
export default {
    name: 'Main'
}
</script>

<style>

  .contenitore_debug{
    min-height: 100vh;
    width: 100%;
  }

</style>