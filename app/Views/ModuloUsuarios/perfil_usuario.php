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
              <div class="card-body">
                <div class="row">
                  <div class="col-8 col-md-8 col-lg-3 order-2 order-md-1">
                    <div class="m-2">

                      <div id="contenedor_avatar">
                        <img src="<?php echo base_url("public/dist/img/avatar") . '/' . $_SESSION['avatar'] ?>" id="previewImg" class="main-profile-img" />
                        <i class="fa fa-edit iconoedit" id="icon_btn_edit"></i>
                        <form enctype="multipart/form-data" method="post" id="formAvatar">
                          <input type="file" onchange="previewFile(this);" class="form-control" id="photo" name="photo" accept="image/*">
                          <input type="hidden" name="id_user" value="<?php echo $_SESSION['id']; ?>" id="id_user">
                          <div id="divBtnAvatar" class="m-4">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-md-12 col-lg-8 order-1 order-md-4">
                    <h3 class="text-success"><i class="fas fa-address-book mr-4"></i> <b>Datos Perfil</b></h3>

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
                            <div class="col-md-4" id="show_city">
                              <label for="ciudad_edit" class="form-label">Ciudad</label>
                              <input type="text" class="form-control" id="ciudad_edit" name="ciudad_edit" value="" disabled>
                            </div>
                            <div class='col-md-4' id="opcion_depart">
                              <label class='form-label'>Departamento</label>

                              <select name='departamento' id='departamento' class='form-control '>
                                <option value='selected disabled'>Seleccione Departamento</option>
                                <?php
                                foreach ($departamentos as $departamentos) { ?>
                                  <option value=' <?php echo $departamentos['id'] ?>'><?php echo $departamentos['nombre'] ?></option>
                                <?php } ?>
                              </select>

                            </div>
                            <div class='col-md-4' id="opcion_city">
                              <label class='form-label'>Ciudad</label>
                              <select name="ciudad" id="ciudad" class="form-control">
                                <option value="">Seleccione Ciudad</option>
                              </select>
                            </div>
                            <div class="col-12 mt-4">
                              <button id="campos_editar" class="btn btn-success"><i class="fas fa-user-edit mr-2"></i>Editar Datos</button>
                            </div>
                            <div id="btn" class="mt-3">

                            </div>
                          </form>
                        </div>
                        <!-- /.tab-pane -->
                        <!-- Formulario para modificar la contraseña  -->
                        <div class="tab-pane" id="settings">
                          <form class="row g-3" method="POST">
                          <input type="hidden" id="id_perfil_pass" value="<?php echo $_SESSION["id"]; ?>">
                            <div class="col-md-6">
                              <label for="email" class="form-label">Correo</label>
                              <input type="email" class="form-control" id="email" name="email" disabled>
                            </div>
                            <div class="col-md-6">
                              <label for="password" class="form-label">Contraseña</label>
                              <input type="password" class="form-control" id="password_db" placeholder="Ingrese su contraseña actual">
                            </div>
                            <div class="col-md-6">
                              <label for="password_new" class="form-label">Nueva Contraseña</label>
                              <input type="password" class="form-control" id="new_password" placeholder="Ingrese la nueva Contraseña">
                            </div>
                            <div class="col-md-6">
                              <label for="password_conf" class="form-label">Confirmar Contraseña</label>
                              <input type="password" class="form-control" id="conf_password" placeholder="Confirme la nueva contraseña">
                            </div>
                            <div class="col-12 mt-4">
                              <button id="edit_password" class="btn btn-success"><i class="fas fa-key mr-2"></i>Guardar Nueva Contraseña</button>
                            </div>
                          </form>
                        </div>
                        <!-- Fin del Formulario para modificar la contraseña  -->
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card -->
            </section>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    </div>
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
    $('#opcion_depart').hide();
    $('#opcion_city').hide();

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
        let btn = "<button type='submit' class='btn btn-success ml-4' id='done'><i class='fas fa-check'></i></button>"

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
    // setInterval(() => {
    //   console.log("Hola mundo");
    // }, 5000);
   
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

          $('#avatar').attr('src', '<?php echo base_url("public/dist/img/avatar") ?>/' + data.ruta)
          $('#avatar_menu').attr('src', '<?php echo base_url("public/dist/img/avatar") ?>/' + data.ruta)
          $('#divBtnAvatar').slideUp();
          $('#divBtnAvatar').html('')
          $('#contentsito').css('margin-top', '0')

          var file = $("input[type=file]").get(0).files[0];
          var reader = new FileReader();
          var target = null;

          reader.onload = function(e) {
            target = e.target || e.srcElement;
            $("#avatar_menu").attr("src", target.result);
          };
          reader.readAsDataURL(file);

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
            departamento: departamento
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
          alert("sdsd");
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
      for (var i = 0; i < data.length; i++) {
        $('#documento_edit').val(data[i].documento);
        $('#nombre_edit').val(data[i].nombres);
        $('#apellido_edit').val(data[i].apellidos);
        $('#email_edit').val(data[i].email);
        $('#email').val(data[i].email);
        $('#tipous_edit').val(data[i].tipo_usuario);
        $('#estado_edit').val(data[i].estado);
        $('#fecha_insert').val(data[i].fecha_insert);
        $('#genero').val(data[i].genero);
        $('#telefono_edit').val(data[i].telefono);
        $('#direccion_edit').val(data[i].direccion);
        $('#ciudad_edit').val(data[i].nombre);
        
      }
    }).fail(function(data) {
      console.log(data)
    });
    $('#campos_editar').on('click', habilitar_campos);
    $("#edit_password").on('click', cambiar_password);

  }

  function habilitar_campos(e) {
    e.preventDefault();
    $('#nombre_edit').prop('disabled', false);
    $('#apellido_edit').prop('disabled', false);
    $('#telefono_edit').prop('disabled', false);
    $('#direccion_edit').prop('disabled', false);

    $('#campos_editar').remove();
    $('#opcion_depart').show();
    $('#opcion_city').show();
    $('#show_city').hide();
    let btn = "<button type='submit' class='btn btn-warning' id='guardar'><i class='fas fa-user-check mr-2'></i>Guardar datos</button>"
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
    var id_ciudad = $('#ciudad').val();

    if (nombre_edit == '' || apellido_edit == '' || tel_edit == '' ||
      direccion_edit == '' || id_ciudad == '') {
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
          id_perfil: id_perfil,
          nombre_edit: nombre_edit,
          apellido_edit: apellido_edit,
          tel_edit: tel_edit,
          direccion_edit: direccion_edit,
          id_ciudad: id_ciudad
        },

      }).done(function(data) {

        if (data) {
          Swal.fire({
            text: "Se ha modificado los datos del Usuario",
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
 

  function cambiar_password(e){
    e.preventDefault();
    
  var id_perfil=$('#id_perfil_pass').val();
  var password_db=$('#password_db').val();
  var new_password=$('#new_password').val();
  var password_conf=$('#conf_password').val();

  if (new_password == password_conf){
      $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/PasswordPerfil'); ?>',
        type: 'POST',
        dataType: "text",
        data: {
          id_perfil: id_perfil,
          password_db  :password_db,
          new_password :new_password
        },
      }).done(function(data) {
        if (data) {
          Swal.fire({
            text: "Se ha modificado correctamente la contraseña",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
          })
        }
      }).fail(function() {
        alert("error al enviar");
      });
  } else {
    Swal.fire({
      icon: 'error',
      title: 'la contraseña no coinciden',
      text: 'Intenta Nuevamente!',
    })
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