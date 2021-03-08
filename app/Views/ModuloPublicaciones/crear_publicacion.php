<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-plus"></i>
                Crear Publicación
              </h3>
            </div>
            <div class="card-body">
              <input type="hidden" id="tipoUser" value="<?php echo $_SESSION['tipo_usuario']; ?>">
              <form action="" method="post">

                <div id="smartwizard">
                  <ul>
                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>
                      <li><a href="#comenzar">Comenezar<br /><small>¿Que quieres vender?</small></a></li>

                    <?php } ?>
                    <li><a href="#step-1">Paso 1<br /><small>Describe tu producto</small></a></li>
                    <li><a href="#step-2">Paso 2<br /><small>Ingresa un precio y cantidad</small></a></li>
                    <li><a href="#step-3">Paso 3<br /><small>Asignale beneficios y/o promociones</small></a></li>
                    <li><a href="#step-4">Step 4<br /><small>Sube las fotos del producto</small></a></li>
                  </ul>
                  <div class="mt-4">

                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>
                      <div id="comenzar">

                        <div class="container">
                          <div class="container" align="center">
                            <input type="radio" value="productos" name="tipo_de_producto" id="productos">
                            <label for="productos" class="labelRadio">
                              <i class="fa fa-box" aria-hidden="true"></i>
                              <span>Productos</span>
                            </label>
                            <input type="radio" value="servicios" name="tipo_de_producto" id="servicios">
                            <label for="servicios" class="labelRadio">
                              <i class="fa fa-user-tie" aria-hidden="true"></i>
                              <span>Servicios</span>
                            </label>
                          </div>
                          <div class="mt-3 mb-3" align="center">
                            <a href="#step-1" class="btn btn-success btnContinuar">Continuar</a>
                          </div>
                        </div>
                      </div>

                    <?php }  ?>

                    <div id="step-1">
                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <input type="text" class="form-control" name="titulo" placeholder="Titulo" required>
                        </div>
                      </div>

                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <textarea name="descripcion" placeholder="Descripcion" class="form-control" rows="4"></textarea>
                        </div>
                      </div>


                    </div>
                    <div id="step-2">
                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <input type="nomber" name="precio" id="" placeholder="precio">
                        </div>
                      </div>
                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <input type="nomber" name="stock" id="" placeholder="stock">
                        </div>
                      </div>

                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <select name="unidad" id="">
                            <?php foreach ($unidades as $unidad) { ?>
                              <option value="<?php echo $unidad['id'] ?>"><?php echo $unidad['nombre'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div id="step-3" class="">
                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Ofrecer Envio </label>
                          </div>
                        </div>
                      </div>

                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-3">
                          <input type="number" class="form-control" placeholder="Descuento %">
                        </div>
                      </div>
                    </div>
                    <div id="step-4" class="">
                      <div class="justify-content-center mb-3" align="center">
                        <div class="col-md-6">
                          <input id="fileupload" type="file" multiple="multiple" />
                          <hr />
                          <b>Vista Previa</b>
                          <br />
                          <br />
                          <div id="dvPreview">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </form>

            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
</div>

<style>
  input[type="radio"] {
    -webkit-appearance: none;
  }

  .labelRadio {
    height: 180px;
    width: 240px;
    border: 6px solid #18f98d;
    margin: auto;
    border-radius: 10px;
    position: relative;
    color: #18f98d;
    transition: 0.5s;
  }

  .fa {
    font-size: 80px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -80%);
  }

  .labelRadio>span {
    font-size: 25px;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 80%);
  }

  input[type="radio"]:checked+.labelRadio {
    background-color: #18f98d;
    color: #ffffff;
    box-shadow: 0 15px 45px rgb(24, 249, 141, 0.2);
  }

  .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)
  }

  .btn-secondary:focus {
    box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
  }

  .close:focus {
    box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
  }

  .mt-200 {
    margin-top: 200px
  }
</style>



<script>
  $(document).ready(function() {

    $('#smartwizard').smartWizard({
      selected: 0,
      theme: 'arrows',
      autoAdjustHeight: true,
      transitionEffect: 'fade',
      showStepURLhash: false,
      lang: { // Language variables for button
        next: 'Siguiente',
        previous: 'Atras'
      }

    });


  });
</script>

<script language="javascript" type="text/javascript">
  $(function() {
    $("#fileupload").change(function() {
      if (typeof(FileReader) != "undefined") {
        var dvPreview = $("#dvPreview");
        dvPreview.html("");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        $($(this)[0].files).each(function() {
          var file = $(this);
          if (regex.test(file[0].name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function(e) {
              var img = $("<img class='mr-3' />");
              img.attr("style", "height:200px;width: 200px");
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