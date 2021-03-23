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
                <div class="card-body">
                  <div class="row">

                    <div class="col-8 col-md-8 col-lg-3 order-2 order-md-1">
                      <div class="m-2">
                        <img src="<?php echo base_url("public/dist/img/avatar") . '/' . $datos['avatar'] ?>" class="rounded float-start" alt="..." width="200" height="200">
                      </div>
                    </div>

                    <div class="col-12 col-md-10 col-lg-8 order-1 order-md-4">
                      <h3 class="text-success"><i class="fas fa-address-book mr-4"></i><b>Datos Usuario</b></h3>
                      <div class="text-muted">
                        
                          <div class="card-body">
                            <dl class="row">
                              <dt class="col-sm-3">Documento :</dt>
                              <dd class="col-sm-9"><?php echo $datos['documento'] ?></dd>
                              <dt class="col-sm-3">Nombre Completo : </dt>
                              <dd class="col-sm-8"><?php echo $datos['nombres'] . '     ' . $datos['apellidos']; ?></dd>
                              <dt class="col-sm-3">Tipo de usuario :</dt>
                              <dd class="col-sm-9"><?php echo $datos['tipo_usuario'] ?></dd>
                              <dt class="col-sm-3">Genero</dt>
                              <dd class="col-sm-9"><?php echo $datos['genero'] ?></dd>
                              <dt class="col-sm-3">Email :</dt>
                              <dd class="col-sm-9"><?php echo $datos['email'] ?></dd>
                              <dt class="col-sm-3">Telefono :</dt>
                              <dd class="col-sm-9"><?php echo $datos['telefono'] ?></dd>
                              <dt class="col-sm-3">Fecha de registro :</dt>
                              <dd class="col-sm-9"><?php echo $datos['fecha_insert'] ?></dd>
                              <dt class="col-sm-3">Direccion :</dt>
                              <dd class="col-sm-9"><?php echo $datos['direccion'] ?></dd>
                              <dt class="col-sm-3">Ciudad :</dt>
                              <dd class="col-sm-9"><?php echo $datos['nombre'] ?></dd>
                              <dt class="col-sm-3">Estado :</dt>
                              <dd class="col-sm-9"><?php echo $datos['estado'] ?></dd>
                            </dl>
                          </div>
                          <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn  btn-success col-2 mt-4 mb-4 ml-4"><i class="mr-2 fas fa-arrow-circle-left"></i>Regresar</a>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.card -->
            </section>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    </div>
  </div>
</div>