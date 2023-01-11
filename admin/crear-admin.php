<?php include_once 'funciones/sesiones.php'; ?>
<?php include_once 'funciones/funciones.php'; ?>
<?php include_once 'templates/header.php'; ?>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php include_once 'templates/barra.php'; ?>
      
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Administrador</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-10">
        <!-- Main content -->
        <section class="content">
              <!-- Default box -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Crear Admin</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <form method="POST" action="insertar-admin.php" name="crear-admin" id="crear-admin">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo">
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password para Iniciar Sesión">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="agregar-admin" value="0">
                    <button type="submit" class="btn btn-primary">Añadir</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </section>
            <!-- /.content -->
      </div>
    </div>

    
  </div>
  <!-- /.content-wrapper -->

  <?php include_once 'templates/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


