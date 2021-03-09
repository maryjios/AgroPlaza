<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

        <div class="card card-primary ">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('public/dist/img/avatar2.png') ?>" alt="">
              </div>

              <h3 class="profile-username text-center"><?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION["tipo_usuario"];?></p>

            </div>
            <!-- /.card-body -->
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Datos Perfil</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Editar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Seguridad</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                   
                  <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="nombreus" name="nombreus"  value="<?php echo $_SESSION["nombres"];?>" disabled>
                        </div>
                        <label for="inputName" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="apellidous" name="apellidous" value="<?php echo $_SESSION["apellidos"];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION["email"];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="direccion" name="direccion"  value="<?php echo $_SESSION["direccion"];?>" disabled>
                        </div>
                        <label for="inputName" class="col-sm-2 col-form-label">Ciudad</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $_SESSION["id_ciudad"];?>" disabled>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Telelfono</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="direccion" name="direccion"  value="<?php echo $_SESSION["telefono"];?>" disabled>
                        </div>
                        <label for="inputName" class="col-sm-2 col-form-label">Genero</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $_SESSION["genero"];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tipo de usuario</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="direccion" name="direccion"  value="<?php echo $_SESSION["tipo_usuario"];?>" disabled>
                        </div>
                        <label for="inputName" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $_SESSION["estado"];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Fecha de Registro</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="fecha_insert" name="fecha_insert"  value="<?php echo $_SESSION["fecha_insert"];?>" disabled>
                        </div>
                        <!-- <label for="inputName" class="col-sm-2 col-form-label">Ciudad</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="ciudad" name="ciudad" value="" disabled>
                        </div> -->
                      </div>

                    </form>
                  
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <form class="row g-3">
                        <div class="col-md-6">
                          <label for="nombre_edit" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre_edit" value="">
                        </div>
                        <div class="col-md-6">
                          <label for="apellido_edit" class="form-label">apellido</label>
                          <input type="text" class="form-control" id="apellido_edit" value="">
                        </div>
                        <div class="col-12">
                          <label for="direccion_edit" class="form-label">Dirección</label>
                          <input type="text" class="form-control" id="direccion_edit" value="">
                        </div>
                        <div class="col-6">
                          <label for="inputAddress2" class="form-label">Ciudad</label>
                          <input type="text" class="form-control" id="ciudad_edit" value="">
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Departamento</label>
                          <input type="text" class="form-control" id="departamento" disabled>
                        </div>

                        <div class="col-md-6">
                          <label for="inputZip" class="form-label">telefono</label>
                          <input type="text" class="form-control" id="telefono_edit">
                        </div>
                        <div class="col-md-6">
                          <label for="inputZip" class="form-label">Avatar</label>
                          <input type="file" class="form-control" id="avatar_edit">
                          
                        </div>
                        <div class="col-12 mt-4">
                          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                  </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <form class="row g-3">
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Correo</label>
                      <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                      <label for="apellido_edit" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-6">
                      <label for="apellido_edit" class="form-label">Nueva Contraseña</label>
                      <input type="password" class="form-control" id="new_password">
                    </div>
                    <div class="col-md-6">
                      <label for="apellido_edit" class="form-label">Confirmar Contraseña</label>
                      <input type="password" class="form-control" id="conf_passwosd">
                    </div>
                    <div class="col-12 mt-4">
                      <button type="submit" class="btn btn-primary">Guardar Nueva Confirmar</button>
                    </div>

                  </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  </div>