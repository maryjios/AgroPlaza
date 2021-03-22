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
                        <img src="<?php echo base_url("public/dist/img/avatar") . '/' . $datos['avatar'] ?>" class="rounded float-start" width="200" height="200">
                      </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8 order-1 order-md-4">
                      <h3 class="text-primary"><i class="fas fa-address-book mr-4"></i>Datos Usuario</h3>
                      <div class="text-muted">
                        <div class="row g-3 needs-validation">

                          <div class="card-body">
                            <dl class="row">
                              <input type="hidden" id="id_pen" value='<?php echo $datos['id'] ?>'>
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
                              <dt class="col-sm-2">Especialidad:</dt>
                              <dd class="col-sm-9"><?php echo $especialidad['nombre'] ?></dd>
                            </dl>
                            <ul class="list-group list-group-unbordered mb-3">
                            
                            <div class="form-group row">
                              <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <select class="form-control" id="nuevo_estado" disabled>
                                    <option id="defec" selected><?php echo $datos['estado'] ?></option>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                          <br>
                          <div class="col-12">

                            <div class="card-header">
                              <h2 class="card-title">Certificados</h2>
                            </div>
                            <div class="card-body">
                              <div class="row">

                                <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                  <a href="<?php echo base_url("public/dist/img/certificados") . '/' . $especialidad['certificado'] ?>" data-toggle="lightbox" data-title="certificado">
                                    <img src="<?php echo base_url("public/dist/img/certificados") . '/' . $especialidad['certificado'] ?>" class="img-fluid mb-2" alt="red sample" />
                                  </a>
                                </div>

                              </div>
                            </div>
                            <br>
                          </div>
                          <a href="<?php echo base_url('/ModuloUsuarios/BuscarPendientes') ?>" class="btn  btn-primary mt-6 mb-4 mr-2">Regresar</a>
                          <div id="btn" class="text-center mt-6 mb-4">
                            <a type="button" id="mod_estado" class="btn  btn-warning">Modificar Estado</a>
                          </div>
                        </div>
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
<script>
  $(document).ready(iniciar);

  function iniciar() {
    $('#mod_estado').click(modificar_est)
  }

  function modificar_est() {
    $('#mod_estado').hide();
    //$('#defec').remove()
    let btn = "<button type='submit' class='btn btn-warning' id='actualizar'>Guardar datos</i></button>"
    $('#btn').html(btn);
    $('#nuevo_estado').prop('disabled', false);
    $('#actualizar').click(actualizapen);


  }

  function actualizapen() {
    var id_pen = $('#id_pen').val();
    var new_estado = $('#nuevo_estado').val();


    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/ActualizarPen'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        id_pen: id_pen,
        new_estado: new_estado
      },
    }).done(function(data) {

      if (data == "USUARIO#ACTUALIZADO") {

        Swal.fire({
          text: "Se ha modificado el estado del Usuario",
          icon: 'success',
          confirmButtonColor: '#23F672',
          confirmButtonText: 'Aceptar',

        }).then((result) => {

          window.location = '<?php echo base_url('/ModuloUsuarios/BuscarPendientes'); ?>';
        })

      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>
<script>
  $(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({
      gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>