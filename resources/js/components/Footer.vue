<template>

  <div class="container">
  <footer class="py-5">
    <div class="row">
      <div class="col-12 col-md-4">
        <h5>INFORMAZIONI</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Newsroom</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Opportunità di lavoro</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Scopri le nuove funzionalità</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-4">
        <h5>COMMUNITY</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Argomenti di discussione</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tagging e messaggistica diretta</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Esperienza locale</a></li>
        </ul>
      </div>

      <div class="col-12 col-md-4">
        <h5>OSPITA</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Prova a opsitare</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Vai al forum della community</a></li>
        </ul>
      </div>

    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
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

<style>

  @import "../../../public/fonts/ruddy_black/stylesheet.css";

    h5 {
        font-family: 'ruddyblack';
    }

  .border-top {
    border-top: 5px solid black !important;
  }
  
</style>