<template>
  <div class="container text-center">
    
    <h1>404 | Pagina non trovata</h1>
    <img class="img-404" src="http://127.0.0.1:8000/storage/elements/404.png" alt="404 icon">
  </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style scoped lang='scss'>
@import "../../sass/partials/_font.scss";

  h1 {
    font-family: 'ruddyblack';
    margin-top: 100px;
  }

  .img-404 {
    width: 30%;
    margin: 20px 0px;
  }

</style>