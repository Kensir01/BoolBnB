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
    height: 500px;
    width: 100%;
  }

</style>