<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-light">
              <p class="card-title text-secondary font-weight-bold pr-2">
                <i class="fas fa-plus mr-1"></i>
                Crear Publicación
                <p class="text-secondary font-weight-bold small mt-1"> (todos los campos son obligatorios)</p>
              </p>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" method="post" id="registrar_publicacion">
                <input type="hidden" id="tipoUser" name="tipoUser" value="<?php echo $_SESSION['tipo_usuario']; ?>">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">

                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right text-secondary">Nombre del producto :</p>
                  </div>
                  <div class="col-md-9"> <input type="text" name="titulo" id="titulo" class="form-control" required> </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Descripción del Producto :</p>
                  </div>
                  <div class="col-md-9"> <input type="text" name="descripcion" id="descripcion" class="form-control" required> </div>
                </div>
                <br>

                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Ubicacion :</p>
                  </div>
                    <div class="col-md-3">
                    <select name="departamento" id="departamento" class="form-control">
                        <option value="">Seleccione Departamento</option>
                        <?php

                        foreach ($departamentos as $departamentos) { ?>

                            <option value="<?php echo $departamentos['id'] ?>"><?php echo $departamentos['nombre'] ?></option>

                        <?php } ?>
                    </select>
                    </div>
                    <div class="col-md-3">
                    <select name="ciudad" id="ciudad" class="form-control">
                        <option value="">Seleccione Ciudad</option>
                    </select>
                    </div>
                </div>
                <br>
                
                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Tipo de Publicación :</p>
                  </div>
                  <div class="col-md-9">
                    <select name="tipo_publicacion" id="tipo_producto" class="form-control">
                      <?php if ($_SESSION['tipo_usuario'] == "VENDEDOR_ESPECIALISTA") { ?>
                        <option disabled selected value="">Seleccione un tipo</option>
                        <option value="servicio">Servicio</option>
                      <?php } ?>
                      <option value="producto">Producto</option>
                    </select>
                  </div>
                </div>
                <br>
                
                <div id="seleccion_producto">
                  
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Precio:</p>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-dollar-sign"></span>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="precio" name="precio" id="precio">

                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Descuento :</p>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group mb-3">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-percent"></span>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Opcional" name="descuento" id="descuento">

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <p class="float-right">Ofrecer envio :</p>
                  </div>
                  <div class="col-md-9">
                    <!-- Checked switch -->
                    <div class="custom-control custom-switch">
                      <input type="checkbox" name="envio" class="custom-control-input" id="envio" value="NO">
                      <label class="custom-control-label" for="envio"></label>
                    </div>
                  </div>
                </div>
                <br>
                <div class="col-md-12" align="center">

                  <input id="fotos" type="file" name="fotos[]" multiple="multiple" accept="image/*" />
                  <hr />
                  <b>Vista Previa</b>
                  <br />
                  <br />
                  <div id="dvPreview">
                  </div>
                </div>

                <button type="submit" class="btn btn-success">Publicar</button>
              </form>
            </div>
            <!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
</div>

<script language="javascript" type="text/javascript">
  $(function() {
    $("#fotos").change(function() {
      if (typeof(FileReader) != "undefined") {
        var dvPreview = $("#dvPreview");
        dvPreview.html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        $($(this)[0].files).each(function() {
          var file = $(this);
          if (regex.test(file[0].name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function(e) {
              var img = $("<img />");
              img.attr("style", "height:100px;width: 100px");
              img.attr("src", e.target.result);
              dvPreview.append(img);
            }
            reader.readAsDataURL(file[0]);
          } else {
            alert(file[0].name + " is not a valid image file.");
            dvPreview.html("");
            return false;
          }
        });
      } else {
        alert("This browser does not support HTML5 FileReader.");
      }
    });
  });
</script>

<script>
  $(document).ready(iniciar);

  function iniciar() {

    $('#ciudad').attr("disabled", true);

    $("#departamento").on('change', elegirDepartamento);

    $("#registrar_publicacion").submit(formRegistrarPublicacion);

    $("#envio").click(comprobarCheck);

    esconderStock();

    $("#tipo_producto").click(esconderStock);
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
        alert("sdsd");
      });
    }
  }

  function comprobarCheck() {
    var condicion = $("#envio").is(":checked");
    if (condicion) {
      $("#envio").val("SI")
    } else {
      $("#envio").val("NO")
    }
  }

  function esconderStock() {
    var tipo = $("#tipo_producto").val()
    if (tipo == "producto") {
      var stock = `<div class="row">
                    <div class="col-md-3">
                      <p class="float-right">Stock :</p>
                    </div>
                    <div class="col-md-9"> <input type="number" name="stock" id="stock" class="form-scontrol" required> </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-3">
                      <p class="float-right">Unidad :</p>
                    </div>
                    <div class="col-md-9">
                      <select name="unidad" id="unidad" class="form-control">
                        <option disabled selected value="" aria-readonly="true">Seleccione unidad</option>
                        <?php foreach ($unidades as $unidad) { ?>
                          <option value=" <?php echo $unidad['id'] ?>"><?php echo $unidad['nombre'] ?></option>
                        <?php }  ?>

                      </select>
                    </div>
                  </div>
                  <br>`
      $("#seleccion_producto").html(stock)
    } else {
      $("#seleccion_producto").html("")
    }
  }

  function formRegistrarPublicacion(e) {
    e.preventDefault();

    titulo = $("#titulo").val();
    descripcion = $("#descripcion").val();
    precio = $("#precio").val();


    if (titulo != "" && descripcion != "" && precio != "") {

      var datos_formulario = new FormData($('#registrar_publicacion')[0]);

      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/InsertarPublicacion'); ?>',
        type: "POST",
        dataType: "text",
        data: datos_formulario,
        contentType: false,
        processData: false
      })
      .done(function(data) {

        console.log(data);
        if (data == "OK#CORRECTO") {

          alert("PUBLICACION INSETADA CORRECTAMENTE");

          $("#titulo").val('');
          $("#descripcion").val('');
          $("#stock").val('');
          $("#precio").val('');
          $("#envio").val('');
          $("#fotos").val('');
          $("#unidad").val('');
          $("#descuento").val('');
          $("#dvPreview").html('');


        } else if (data == "OK#INVALID#DATA") {

          alert("OCURRIO UN ERROR AL INSERTAR LA PUBLICACION");

        } else {

          alert(data);

        }
      })
      .fail(function(data) {
        alert("error en el proceso");
        console.log(data);
      });
    } else {

      alert('todos los campos son oblicatorios')
    }

  }
</script>