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
              <h4>Completa los datos</h4>
              <div class="row">
                <div class="col-5 col-sm-3">

                  <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
<<<<<<< Updated upstream
                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>
=======
                    <?php if ($_SESSION['tipo_usuario'] == 'ADMINISTRADOR') { ?>
>>>>>>> Stashed changes

                      <a class="nav-link active" id="vert-tabs-home-tab-admin" data-toggle="pill" href="#vert-tabs-home-admin" role="tab" aria-controls="vert-tabs-home-admin" aria-selected="true">Elige el tipo de Producto</a>

                    <?php } else { ?>

                      <a class="nav-link active" id="vert-tabs-home-tab-vendedor" data-toggle="pill" href="#vert-tabs-home-vendedor" role="tab" disabled="true" aria-readonly="true" aria-controls="vert-tabs-home-vendedor" aria-selected="true">Empezar</a>

                    <?php } ?>

<<<<<<< Updated upstream
                    <a class="nav-link disabled" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Describe tu producto</a>
                    <a class="nav-link disabled" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Precio y Otros Detalles</a>
=======
                    <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Describe tu producto</a>
                    <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Precio y Otros Detalles</a>
>>>>>>> Stashed changes
                    <a class="nav-link disabled" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Carga tus imagenes</a>
                  </div>
                </div>
                <div class="col-7 col-sm-9">
                  <div class="tab-content" id="vert-tabs-tabContent">
<<<<<<< Updated upstream
                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>
=======
                    <?php if ($_SESSION['tipo_usuario'] == 'ADMINISTRADOR') { ?>
>>>>>>> Stashed changes

                      <div class="tab-pane text-left fade active show" id="vert-tabs-home-admin" role="tabpanel" aria-labelledby="vert-tabs-home-tab-admin">
                        <div class="container" align="center">

                          <input type="radio" value="productos" name="tipo_de_producto" id="productos">
                          <label for="productos">
                            <i class="fa fa-box" aria-hidden="true"></i>
                            <span>Productos</span>
                          </label>
                          <input type="radio" value="servicios" name="tipo_de_producto" id="servicios">
                          <label for="servicios">
                            <i class="fa fa-user-tie" aria-hidden="true"></i>
                            <span>Servicios</span>
                          </label>
                        </div>
                        <br><a class="btn btn-primary float-right btnContinuar1 disabled">Continuar</a>
                      </div>

                    <?php } else { ?>

                      <div class="tab-pane text-left fade active show" id="vert-tabs-home-vendedor" role="tabpanel" aria-labelledby="vert-tabs-home-tab-vendedor">
                        xx Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                        <br><a class="btn btn-primary float-right btnContinuar">Continuar</a>
                      </div>


                    <?php } ?>

                    <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                      Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                    </div>

                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                    </div>
                    <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                      Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
</div>

<style>
  input[type="radio"] {
    -webkit-appearance: none;
  }

  label {
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

  label>span {
    font-size: 25px;
    font-family: "Poppins", sans-serif;
    font-weight: 500;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 80%);
  }

  input[type="radio"]:checked+label {
    background-color: #18f98d;
    color: #ffffff;
    box-shadow: 0 15px 45px rgb(24, 249, 141, 0.2);
  }
</style>



<script>
  $(document).ready(iniciar);

  function iniciar() {

    $("input[name='tipo_de_producto']").on('click', HabilitarBotones1);



  }

  function HabilitarBotones1() {

    valor_seleccionado = $("input[name='tipo_de_producto']:checked").val();

    if (valor_seleccionado != undefined) {

      $(".btnContinuar1").removeClass("disabled")

    } else {

      $(".btnContinuar1").addClass("disabled")


    }
  }
</script>
