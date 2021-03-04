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
                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>

                      <a class="nav-link active" id="vert-tabs-home-tab-vendedor-especialista" data-toggle="pill" href="#vert-tabs-home-vendedor-especialista" role="tab" aria-controls="vert-tabs-home-vendedor-especialista" aria-selected="true">Elige el tipo de Producto</a>

                    <?php } else { ?>

                      <a class="nav-link active" id="vert-tabs-home-tab-vendedor" data-toggle="pill" href="#vert-tabs-home-vendedor" role="tab" disabled="true" aria-readonly="true" aria-controls="vert-tabs-home-vendedor" aria-selected="true">Empezar</a>

                    <?php } ?>

                    <a class="nav-link disabled" id="btncontentDescribirProducto" data-toggle="pill" href="#contentDescribirProducto" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Describe tu producto</a>
                    <a class="nav-link disabled" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Precio y Otros Detalles</a>
                    <a class="nav-link disabled" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Carga tus imagenes</a>
                  </div>
                </div>
                <div class="col-7 col-sm-9">
                  <div class="tab-content" id="vert-tabs-tabContent">
                    <?php if ($_SESSION['tipo_usuario'] == 'VENDEDOR_ESPECIALISTA') { ?>

                      <div class="tab-pane text-left fade active show" id="vert-tabs-home-vendedor-especialista" role="tabpanel" aria-labelledby="vert-tabs-home-tab-vendedor-especialista">
                        <div class="container" align="center">

                          <input type="radio" value="productos" name="tipo_de_producto" id="productos">
                          <label for="productos" class="labelRadio">
                            <i class="fa fa-box" aria-hidden="true"></i>
                            <span>Productos</span>
                          </label>
                          <input type="radio" value="servicios" name="tipo_de_producto" id="servicios">
                          <label for="servicios">
                            <i class="fa fa-user-tie" aria-hidden="true"></i>
                            <span>Servicios</span>
                          </label>
                        </div>
                        <br>
                        <a class="btn btn-success float-right btnContinuar disabled">Continuar</a>
                      </div>

                    <?php } else { ?>

                      <div class="tab-pane text-left fade active show contentInicioVendedor" id="vert-tabs-home-vendedor" role="tabpanel" aria-labelledby="vert-tabs-home-tab-vendedor">
                        <div>
                          <h6 class="text-success">HOLA, RECUERDA QUE PARA PUBLICAR UN PRODUCTO DEBES CARGAR MINIMO 1 FOTO DE LO QUE QUIERES VENDER, ESTA LISTO PARA EMPEZAR PRESIONA EL BOTON CONTINUAR! </h6>
                        </div>
                        <br><button type="button" class="btn btn-success btnContinuar float-right mt-5">Continuar</button>
                      </div>


                    <?php } ?>

                    <div class="tab-pane fade describir_producto" align="center" id="contentDescribirProducto" role="tabpanel" aria-labelledby="btncontentDescribirProducto">

                      <div class="row col-6 justify-content-center text-center mb-2">
                        <label for="titulo">Titulo del Producto</label>
                        <input type="text" class="form-control" placeholder="Agrega un titulo a tu producto">
                      </div>

                      <div class="row col-6 justify-content-center text-center mb-2">
                        <label for="titulo">Descripcion</label>
                        <textarea name="descripcion" class="form-control" id="" cols="30" rows="4"></textarea>
                      </div>
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
    $('.btnContinuar').on('click', SiguentePaso);


  }

  function HabilitarBotones1() {

    valor_seleccionado = $("input[name='tipo_de_producto']:checked").val();

    if (valor_seleccionado != undefined) {

      $(".btnContinuar1").removeClass("disabled")

    } else {


      $(".btnContinuar1").addClass("disabled")


    }
  }

  function SiguentePaso() {
    alert("as")
    $('#vert-tabs-home-tab-vendedor').removeClass('active')
    $('.contentInicioVendedor').removeClass('active')
    $('.contentInicioVendedor').removeClass('show')



    $('#btncontentDescribirProducto').removeClass("disabled")
    $('#btncontentDescribirProducto').addClass('active')
    $('.describir_producto').addClass('active')
    $('.describir_producto').addClass('show')


  }
</script>