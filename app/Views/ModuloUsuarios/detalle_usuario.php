<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles Perfil Usuario</h3>
            </div>


            <section class="content">

              <!-- Default box -->
              <div class="card">

                <div class="card-body">
                  <div class="row">
                    <div class="col-8 col-md-8 col-lg-3 order-2 order-md-1">
                      <div class="m-2">

                        <img src="<?php echo base_url("public/dist/img/avatar") . '/' . $datos['avatar'] ?>" class="rounded float-start" alt="..." width="200" height="200">

                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8 order-1 order-md-4">
                      <h3 class="text-primary"><i class="fas fa-address-book mr-4"></i>Datos Usuario</h3>
                      <div class="text-muted">
                        <form class="row g-3 needs-validation" novalidate>

                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-2">Documento :</dt>
                              <dd class="col-sm-9"><?php echo $datos['documento'] ?></dd>
                              <dt class="col-sm-3">Nombre Completo : </dt>
                              <dd class="col-sm-8"><?php echo $datos['nombres'] . '     ' . $datos['apellidos']; ?></dd>
                              <dt class="col-sm-3">Tipo de usuario :</dt>
                              <dd class="col-sm-9"><?php echo $datos['tipo_usuario'] ?></dd>
                              <dt class="col-sm-2">Genero</dt>
                              <dd class="col-sm-9"><?php echo $datos['genero'] ?></dd>
                              <dt class="col-sm-2">Email :</dt>
                              <dd class="col-sm-9"><?php echo $datos['email'] ?></dd>
                              <dt class="col-sm-2">Telefono :</dt>
                              <dd class="col-sm-9"><?php echo $datos['telefono'] ?></dd>
                              <dt class="col-sm-3">Fecha de registro :</dt>
                              <dd class="col-sm-9"><?php echo $datos['fecha_insert'] ?></dd>
                              <dt class="col-sm-2">Direccion :</dt>
                              <dd class="col-sm-9"><?php echo $datos['direccion'] ?></dd>
                              <dt class="col-sm-2">Ciudad :</dt>
                              <dd class="col-sm-9"><?php echo $datos['nombre'] ?></dd>
                              <dt class="col-sm-2">Estado :</dt>
                              <dd class="col-sm-9"><?php echo $datos['estado'] ?></dd>
                            </dl>
                           
                          </div>
                          <br>
                          <br>
                          
                          <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn  btn-primary mt-6 mb-4 mr-2">Regresar</a>
                          
                        </form>

                      </div>

                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </section>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    </div>
  </div>
</div>