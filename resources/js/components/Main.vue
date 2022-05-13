<template>
  <div class="contenitore_debug">
      <router-view />
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