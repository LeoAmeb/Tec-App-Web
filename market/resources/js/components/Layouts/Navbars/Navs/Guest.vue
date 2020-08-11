<!-- NAVEGACIÓN DE USUARIO INVITADOR -->
<template>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="/">
          <b>Micrositios</b>
        </a>
      </div>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        aria-controls="navigation-index"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">

          <!-- REGISTRAR USUARIO -->
          <li class="nav-item">
            <a href="/register" class="nav-link">
              <i class="material-icons">person_add</i>
              Registrarse
            </a>
          </li>
          
          <!-- INICIAR SESIÓN -->
          <li class="nav-item">
            <a href="/login" class="nav-link">
              <i class="material-icons">fingerprint</i>
              Iniciar sesión
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name:'Guest'
}
</script>