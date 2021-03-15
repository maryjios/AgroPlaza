<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="card card-primary ">
    <div class="card-body box-profile">
      <div class="justify-content-center" align="center">
        <div id="contenedor_avatar">
          <img src="<?php echo base_url("public/dist/img/avatar") . '/' . $_SESSION['avatar'] ?>" id="previewImg" class="main-profile-img" />
          <i class="fa fa-edit iconoedit" id="icon_btn_edit"></i>
          <form enctype="multipart/form-data" method="post" id="formAvatar">
            <input type="file" onchange="previewFile(this);" class="form-control" id="photo" name="photo" accept="image/*">
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" id="id_user">
            <div id="divBtnAvatar" class="mt-3">
            </div>
          </form>
        </div>
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
          <li class="nav-item"><a class="nav-link active" href="#modal_editar" data-toggle="tab">Datos Perfil</a></li>
          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Seguridad</a></li>
        </ul>

      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">

          <!-- /.tab-pane -->
          <div class="active tab-pane" id="modal_editar">
            <!-- modal para editar perfil-->
            <form class="row g-3" id="editar_datos" action="#" method="post">
              <div class="col-md-4">
                <!-- id usuario  -->
                <input type="hidden" id="id_perfil" value="<?php echo $_SESSION["id"]; ?>">

                <label for="documento_edit" class="form-label">Documento</label>
                <input type="text" class="form-control" id="documento_edit" name="documento_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="nombre_edit" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_edit" name="nombre_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="apellido_edit" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_edit" name="apellido_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="email_edit" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email_edit" name="email_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="tipous_edit" class="form-label">Tipo Usuario</label>
                <input type="text" class="form-control" id="tipous_edit" name="tipous_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="estado_edit" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado_edit" name="estado_edit" value="" disabled>
              </div>

              <div class="col-md-4">
                <label for="fecha_insert" class="form-label">Fecha de Registro</label>
                <input type="text" class="form-control" id="fecha_insert" name="fecha_insert" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="genero" class="form-label">Genero</label>
                <input type="text" class="form-control" id="genero" name="genero" value="" disabled>
              </div>

              <div class="col-md-4">
                <label for="telefono" class="form-label">telefono</label>
                <input type="text" class="form-control" id="telefono_edit" name="telefono_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="direccion_edit" class="form-label">Direccion</label>
                <input type="text" class="form-control" id="direccion_edit" name="direccion_edit" value="" disabled>
              </div>
              <div class="col-md-4">
                <label for="ciudad_edit" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad_edit" name="ciudad_edit" value="" disabled>
              </div>
              <div id="edita_ciudad" class="mt-3">

              </div>


              <div class="col-12 mt-4">
                <button id="campos_editar" class="btn btn-primary">Editar Datos</button>
              </div>
              <div id="btn" class="mt-3">

              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
          <!-- Formulario para modificar la contraseña  -->
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
          <!-- Fin del Formulario para modificar la contraseña  -->
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<style>
  #contenedor_avatar {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    border-style: solid;
    border-color: #FFFFFF;
    box-shadow: 0 0 8px 3px #B8B8B8;
    position: relative;
  }

  #contenedor_avatar img {
    height: 100%;
    width: 100%;
    border-radius: 50%;
  }

  #contenedor_avatar .iconoedit {
    position: absolute;
    top: 20px;
    right: -7px;
    /* border: 1px solid; */
    border-radius: 50%;
    /* padding: 11px; */
    height: 30px;
    width: 30px;
    display: flex !important;
    align-items: center;
    justify-content: center;
    background-color: white;
    color: cornflowerblue;
    box-shadow: 0 0 8px 3px #B8B8B8;
  }

  #photo {
    display: none;
  }

  #icon_btn_edit {
    cursor: pointer;
  }
</style>


<script>
  $(document).ready(iniciar);

  function iniciar() {

    $('#divBtnAvatar').hide()


    $("#icon_btn_edit").click(function() {
      $("#photo").trigger('click');
    });


  }
</script>

<script>
  function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file) {
      var reader = new FileReader();
      reader.onload = function() {
        $("#previewImg").attr("src", reader.result);
        let btn = "<button type='submit' class='btn btn-success' id='done'><i class='fas fa-check'></i></button>"

        $('#divBtnAvatar').html(btn)

        $('#contentsito').css('margin-top', '3.5em')

        $('#divBtnAvatar').slideDown()
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
    $("#departamento").on('change', elegirDepartamento);
    buscardatos();

  }


  function CargarAvatar(e) {
    e.preventDefault();

    var formData = new FormData($("#formAvatar")[0]);

    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/CargarAvatar'); ?>',
        type: "POST",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false
      })
      .done(function(data) {

        if (data.respuesta = 'OK#UPDATE') {

          $('#avatar').attr('src', '<?php echo base_url("public/dist/img/avatar") ?>' + data.avatar)
          $('#divBtnAvatar').slideUp();
          $('#divBtnAvatar').html('')
          $('#contentsito').css('margin-top', '0')


        } else if (data.respuesta = 'ERROR#UPDATE') {
          alert('ERRO en EL  update')
        } else {
          alert('ERRRO EXTERNO')
        }
      })
      .fail(function(data) {
        console.log(data)

      });

  }

  function elegirDepartamento() {
    let departamento = $(this).val();
    var ciudades = $("#ciudad");

    if (departamento != '0') {
      $('#ciudad').attr("disabled", false);

      $.ajax({
          url: '<?php echo base_url('/Inicio/getCiudades'); ?>',
          type: "POST",
          dataType: "json",
          data: {
            departamento: departamento,
          },
        })
        .done(function(data) {
          ciudades.find('option').remove();

          $(data).each(function(i, v) { // indice, valor
            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
          });
        })
        .fail(function(data) {
          console.log("error en el proceso");
        });
    }
  }

  function buscardatos() {
    var id_perfil = $('#id_perfil').val();
    // alert(id_perfil);
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/BuscarDatosPerfil'); ?>',
      type: 'POST',
      dataType: "json",
      data: {
        id_perfil: id_perfil,
      }
    }).done(function(data) {
      console.log(data);

      for (var i = 0; i < data.length; i++) {
        $('#documento_edit').val(data[i].documento);
        $('#nombre_edit').val(data[i].nombres);
        $('#apellido_edit').val(data[i].apellidos);
        $('#email_edit').val(data[i].email);
        $('#tipous_edit').val(data[i].tipo_usuario);
        $('#estado_edit').val(data[i].estado);
        $('#fecha_insert').val(data[i].fecha_insert);
        $('#genero').val(data[i].genero);
        $('#telefono_edit').val(data[i].telefono);
        $('#direccion_edit').val(data[i].direccion);
        $('#ciudad_edit').val(data[i].id_ciudad);
      }
    }).fail(function(data) {
      console.log(data)
    });
    $('#campos_editar').on('click', habilitar_campos);

  }

  function habilitar_campos(e) {
    e.preventDefault();
    $('#nombre_edit').prop('disabled', false);
    $('#apellido_edit').prop('disabled', false);
    $('#telefono_edit').prop('disabled', false);
    $('#direccion_edit').prop('disabled', false);

    $('#campos_editar').remove();
    let btn = "<button type='submit' class='btn btn-primary' id='guardar'>Guardar datos</i></button>"
    $('#btn').html(btn)
    $('#guardar').on('click', guardar_cambios);

  }

  function guardar_cambios(e) {
    e.preventDefault();
    var id_perfil = $('#id_perfil').val();
    var nombre_edit = $('#nombre_edit').val();
    var apellido_edit = $('#apellido_edit').val();
    var tel_edit = $('#telefono_edit').val();
    var direccion_edit = $('#direccion_edit').val();
    console.log(nombre_edit, apellido_edit, tel_edit, direccion_edit)

    if (nombre_edit == '' || apellido_edit == '' || tel_edit == '' ||
      direccion_edit == '') {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "Debe ingresar todos los campos",
      })
    } else {
      // alert('llegan los datos');
      $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/EditarPerfil'); ?>',
        type: 'POST',
        dataType: "text",
        data: {
          id_perfil:id_perfil,
          nombre_edit:nombre_edit,
          apellido_edit:apellido_edit,
          tel_edit:tel_edit,
          direccion_edit:direccion_edit
        },

      }).done(function(data) {

        if (data) {
          Swal.fire({
          text: "Se ha modificado el estado del Usuario",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        }).then((result) => {

          window.location = '<?php echo base_url('/ModuloUsuarios/PerfilUsuario'); ?>';
        }) 
        }
      }).fail(function() {
        alert("error al enviar");
      });
    }
  }






  // function datos_modificar() {
  //   var doc = $('#id_usuario').val();
  //   var name_edit = $('#nombre_edit').val();
  //   var apellido_edit = $('#apellido_edit').val();
  //   var direccion_edit = $('#direccion_edit').val();
  //   var telefono_edit = $('#telefono_edit').val();
  //   var ciudad = $('#ciudad').val();
  //   var departamento = $('#departamento').val();

  //   if (doc == '' || name_edit == '' || apellido_edit == '' || direccion_edit == '' || telefono_edit == '' || ciudad == '' || departamento == '') {
  //     Swal.fire({
  //       text: "Debe ingresar todos los campos",
  //       icon: 'error',
  //       confirmButtonColor: '#3085d6',
  //       confirmButtonText: 'Aceptar',
  //     })
  //   } else {
  //     var formData = new FormData($("#editar_datos")[0]);

  //     alert('llegan');
  //     $.ajax({
  //       url: '<php echo base_url('/ModuloUsuarios/EditarPerfil'); ?>',
  //       type: 'POST',
  //       dataType: "text",
  //       data: formData,
  //       contentType: false,
  //       processData: false
  //     }).done(function(data) {
  //       if (data == "OK#UPDATE") {
  //         Swal.fire({
  //           text: "Se ha modificado el estado del Usuario",
  //           icon: 'success',
  //           confirmButtonColor: '#3085d6',
  //           confirmButtonText: 'Aceptar',

  //         })
  //       }
  //     }).fail(function() {
  //       alert("error al enviar");
  //     });
  //   }
  // }
</script>