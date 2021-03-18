  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Publicacion</b></h2>
                <div class="d-grid d-md-flex  justify-content-md-end">
                  <a class=" btn btn-info mr-4" href="<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>"><i class="fas fa-chevron-circle-left"></i>
                  Volver</a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <div class="col-12">
                      <div class=" d-inline mr-5 primera_imagen " style="height: 480px; width: 260px;">
                        <img  class="product-image img-fluid"  src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$img['imagen'] ?>">
                      </div>        
                    </div>
                    <div class="col-12 product-image-thumbs">

                      <?php 
                         $path = "./public/dist/img/publicaciones/publicacion".$publicacion['id'];
                         if (file_exists($path)) {
                            $directorio = opendir($path);
                            while ($archivo = readdir($directorio)) {
                               if (!is_dir($archivo)) { ?>
                                  <div class=" product-image-thumb">
                                     <img src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$archivo ?>"> 
                                  </div>
                                  
                            <?php }
                            }
                         }
                      ?>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 img-thumbnail p-3">
                    <h2 class="my-3"><?php echo $publicacion['titulo']; ?></h2>
                    <hr class="bg-success " style="height: 10px">
                    <div class="row">
                      <div class="col">
                        <h4>Precio:</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <p><span><i class="fas fa-dollar-sign"></i> </span><?php echo number_format($publicacion['precio'])." * ".$publicacion['unidad']; ?></p>
                        </div>
                      </div>
                      <div class="col ">
                        <h4 class="mb-0">Stock:</h4>
                        <h4 class="mt-0">
                          <small><i class="fas fa-layer-group"></i> <?php if ($publicacion['stock'] >0) {
                            echo "Disponible";
                          }else{
                            echo "No disponible";
                          } ?></small>
                        </h4>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <h4>Envio</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <p><span><i class="fas fa-shipping-fast mr-3"></i></span><?php if ($publicacion['envio']=="NO") {
                            echo "No";
                          }else{
                            echo "Si";
                          }; ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <hr class="bg-warning " style="height: 10px">
                    <div class="row ">
                      <div class="col text-center">
                        <h5>Información del vendedor</h5>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <h5 class="text-success">Vendedor</h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <p><span><i class="fas fa-user-tag"></i></span>
                            <?php echo $publicacion['nombre_usuario'] ?>
                          </p>
                        </div>
                      </div>
                      <div class="col">
                        <h5 class="text-success">Ubicación</h5>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <p><span><i class="fas fa-map-marker-alt"></i></span>
                            <?php echo $publicacion['departamento'].", ".$publicacion['ciudad'] ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col text-center">
                        <button class="btn btn-primary btn-lg"><i class="fas fa-cart-plus fa-lg mr-2"></i>Comprar</button>  
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <nav class="w-100">
                    <div class="nav nav-tabs" id="publicacion_tab" role="tablist">
                      <a class="nav-item nav-link active" id="publicacion_descripcion_tab" data-toggle="tab" href="#publicacion_descripcion" role="tab" aria-controls="publicacion_descripcion" aria-selected="true">Descripción</a>
                      <a class="nav-item nav-link" id="publicacion_pqr_tab" data-toggle="tab" href="#publicacion_pqr" role="tab" aria-controls="publicacion_pqr" aria-selected="false">Preguntas y Respuestas</a>
                      <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Calificaciones</a>
                    </div>
                  </nav>
                  <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="publicacion_descripcion" role="tabpanel" aria-labelledby="publicacion_tab">
                      <p><?php echo $publicacion['descripcion']; ?></p>
                    </div>
                    <div class="tab-pane fade" id="publicacion_pqr" role="tabpanel" aria-labelledby="publicacion_pqr_tab">
                      <p>preguntas y respuestas</p>
                    </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                      <p>Calificaciones</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
      })
    })
  </script>

 
