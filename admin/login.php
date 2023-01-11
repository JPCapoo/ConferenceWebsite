<?php
  session_start();
  $cerrar_sesion = $_GET['cerrar_sesion'];
  if($cerrar_sesion) {
    session_destroy();
  }

  include_once 'funciones/funciones.php';
  include_once 'templates/header.php';
?>

<body class="hold-transition login-page">
  <body class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>GDL</b>WEBCAMP</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión aquí</p>

      <form method="POST" action="insertar-admin.php" name="login-admin" id="login-admin">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="hidden" name="login-admin" value="1">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>

</body>
<!-- ./wrapper -->


