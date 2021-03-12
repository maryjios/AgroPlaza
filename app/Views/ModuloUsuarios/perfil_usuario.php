<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="card card-primary ">
    <div class="card-body box-profile">
      <div class="justify-content-center" align="center">
        <form action="" method="post" enctype="multipart/form-data" id="formAvatar">

          <div id="contenedor_avatar">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION["id"]; ?>">
            <p>
              <input type="file" onchange="previewFile(this);" class="form-control" id="photo" name="photo" accept="image/*">

            </p>
            <img id="previewImg" src="<?php echo base_url('public/dist/img/avatar') . '/' . $_SESSION['avatar']; ?>" alt="Placeholder">
            <p>
              <input type="submit" value="Submit">
            </p>
          </div>
        </form>

      </div>
      <div id="contentsito">
        <h3 class="profile-username text-center"><?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></h3>
        <p class="text-muted text-center"><?php echo $_SESSION["tipo_usuario"]; ?></p>
      </div>
    </div>

    <!-- /.card-body -->
  </div>

  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#Modal_datos" data-toggle="tab">Datos Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="#modal_editar" data-toggle="tab">Editar</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Seguridad</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="Modal_datos">

            <form class="form-horizontal">
              <div class="form-group row">
                <input type="hidden" id="id_documento" name="id_documento" value="" disabled>

                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="nombre_us" name="nombre_us" value="<?php echo $_SESSION["nombres"]; ?>" disabled>
                </div>
                <label for="inputName" class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="apellido_us" name="apellido_us" value="<?php echo $_SESSION["apellidos"]; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control form-control-border border-width-2" id="email_us" name="email_us" value="<?php echo $_SESSION["email"]; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Dirección</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="direccion_us" name="direccion_us" value="<?php echo $_SESSION["direccion"]; ?>" disabled>
                </div>
                <label for="inputName" class="col-sm-2 col-form-label">Ciudad</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="ciudad_us" name="ciudad_us" value="<?php echo $_SESSION["id_ciudad"]; ?>" disabled>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="telefono_us" name="telefono_us" value="<?php echo $_SESSION["telefono"]; ?>" disabled>
                </div>
                <label for="inputName" class="col-sm-2 col-form-label">Genero</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="genero_us" name="genero_us" value="<?php echo $_SESSION["genero"]; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Tipo de usuario</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="tipo_us" name="tipo_us" value="<?php echo $_SESSION["tipo_usuario"]; ?>" disabled>
                </div>
                <label for="inputName" class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="estado_us" name="estado_us" value="<?php echo $_SESSION["estado"]; ?>" disabled>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Fecha de Registro</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-border border-width-2" id="fecha_insert_us" name="fecha_insert_us" value="<?php echo $_SESSION["fecha_insert"]; ?>" disabled>
                </div>
              </div>
            </form>

            <!-- /.post -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="modal_editar">
            <!-- modal para editar perfil-->
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
<<<<<<< HEAD
=======

>>>>>>> bbd1d35d5f86b50f442b363cae6347dc79e21d7d
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
            <form class="row g-3" method="POST">
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




<script>
  function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function() {
        $("#previewImg").attr("src", reader.result);
      }

      reader.readAsDataURL(file);
    }
  }
</script>

<script>
  $(function() {
    Test = {
      UpdatePreview: function(obj) {
        // if IE < 10 doesn't support FileReader
        if (!window.FileReader) {
          // don't know how to proceed to assign src to image tag
        } else {
          var reader = new FileReader();
          var target = null;

          reader.onload = function(e) {
            target = e.target || e.srcElement;
            $("#ImageId").attr("src", target.result);
          };
          reader.readAsDataURL(obj.files[0]);
        }
      }
    };
  });
</script>

<script>
  $(document).ready(iniciar);

  function iniciar() {
    $('#formAvatar').submit(CargarAvatar);

  }


  function CargarAvatar(e) {
    e.preventDefault();

    var formData = new FormData($("#formAvatar")[0]);

    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/CargarAvatar'); ?>',
        type: "POST",
        dataType: "text",
        data: formData,
        contentType: false,
        processData: false
      })
      .done(function(data) {
        if (data.respuesta = 'OK#UPDATE') {
          $('#avatar').attr('src', '<?php echo base_url("public/dist/img/avatar") ?>' + data.avatar)
        } else if (data.respuesta = 'ERROR#UPDATE') {
          alert('ERRO en EL  update')
        } else {
          alert('ERRRO EXTERNO')
        }
      })
      .fail(function(data) {
        $
      });

  }
</script>