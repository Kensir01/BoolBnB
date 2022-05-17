<template>

  <div class="container">
  <footer class="">
    <div class="row">
      <div class="col-12 col-md-4">
        <h5>INFORMAZIONI</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Newsroom</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Opportunità di lavoro</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Scopri le nuove funzionalità</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-4">
        <h5>COMMUNITY</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Argomenti di discussione</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Tagging e messaggistica diretta</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Esperienza locale</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-4">
        <h5>OSPITA</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Prova a ospitare</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Vai al forum della community</a></li>
        </ul>
      </div>

    </div>

    <div class="d-flex justify-content-between py-4 mt-4 border-top">
      <p>© 2022 BoolBnB, Inc. Privacy - Terms - Site Maps - Company details</p>
    </div>
  </footer>
</div>


  
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style scoped lang="scss">

  @import "../../sass/partials/_colors.scss";
  @import "../../sass/partials/_font.scss";
  @import "../../sass/partials/_common.scss";

  footer {
    margin: 50px 0px;
  }

  h5 {
    font-family: 'ruddyblack';
  }

  li a {
    color: $lines;
  }

  li a:hover {
    color: $details;
  }

  .border-top {
    border-top: 5px solid $lines !important;
  }
  
</style>