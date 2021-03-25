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
                      <div class=" d-inline mr-5 primera_imagen " style="height: 480px; width: 600px;">
                        <img  class="product-image img-fluid " src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$img['imagen'] ?>">
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
                            <p><span><i class="fas fa-dollar-sign"></i> </span><?php echo number_format($publicacion['precio'])?> <?php if ($publicacion['tipo_publicacion']=="PRODUCTO"){ echo " * ".$unidad['abreviatura'];} ?></p>
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
                  <div class="col">
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

                       
                      </div>
                      <div class="tab-pane fade overflow-auto"  id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        <?php foreach ($valoraciones as $valoracion): ?>
                          <div class="callout callout-warning p-3 mt-2">
                            <?php if ($valoracion['valoracion']>0) { ?>
                              <i class="fas fa-star"></i>
                            <?php }else { ?>
                              <i class="far fa-star"></i>
                            <?php } ?>
                             <span><?php echo $valoracion['valoracion']; ?> </span>
                            <?php if ($valoracion['foto']!=null) {?>
                              <img src="" alt="Muestra">
                            <?php } ?>
                            <p class="text-secondary"> Por: <?php echo $valoracion['nombre_usuario']." Fecha: ".$valoracion['fecha_valoracion'] ?> </span></p>
                            <p><?php echo $valoracion['descripcion'] ?></p>
                          </div>
                        <?php endforeach ?>
                      </div>
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
  <!-- Modal responder-->
  <div class="modal fade" id="agregar_modal" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Respuesta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <form id="form_nuevoUni" method="post"  autocomplete="of">
                      <div class="row">
                          <div class="form-group col">
                              <input type="hidden" id="enviar_id" >
                              <textarea type="text" class="form-control mt-3 mb-3" disabled name="" id="texto_pregunta"></textarea>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col">
                            <textarea></textarea>
                              
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary guardar" data-dismiss="modal">Guardar</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>

  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
      });

      traerPreguntas();
      

    })

    function traerPreguntas() {
      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/TraerPreguntas?id=').$publicacion['id'];?>',
        type: 'GET',   
        dataType: 'json',
        success: function(data){
          console.log(data)
          var preguntas= "";
          for (var i = 0; i < data.length; i++) {

            preguntas ='<div class="div_preguntas">';
            preguntas+=   '<input class="preg" type="hidden" value="'+data[i].id_pregunta+'">';
            preguntas+=   '<h6>'+data[i].pregunta+'</h6>';
            preguntas+=    '<button class="btn btn-info btn-sm responder mr-2">Responder</button>';
            preguntas+=    '<button class="btn btn-sm btn-danger rechazar">Rechazar</button>';
            preguntas+=    '<div class="div_respuesta"></div>';
            preguntas+= '</div>';
            preguntas+= '<hr>';

            $("#publicacion_pqr").append(preguntas);

          } 
          
          $(".responder").click(abrirInput);
        }
      });
    }


    function abrirInput (){
      var id = $(this).parents(".div_preguntas").find('.preg').val();

      input = `<form class="form-horizontal formulario">
                  <div class="form-group margin-bottom-none row mt-3">
                    <div class="col-sm-6">
                      <input  id="texto_respuesta" type="hidden" value="`+$id+`">
                      <input class="form-control input-sm texto_respuesta" id="texto_respuesta" placeholder="Response">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success pull-right btn-block btn-sm disabled enviar">Enviar</button>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-danger pull-right btn-block btn-sm cancelar">Cancelar</button>
                    </div>
                  </div>
                </form>`;

      $(this).parents(".div_preguntas").find('.div_respuesta').html(input);
      $(".cancelar").click(cerrarInput);

      $(".texto_respuesta").keyup(habilitarEnviar);

    }

    function habilitarEnviar (){
      if ($(this).val()!= "") {
        $(this).parents(".div_preguntas").find('.enviar').removeClass('disabled');
      }else{
        $(this).parents(".div_preguntas").find('.enviar').addClass('disabled');
      }
    }

    function cerrarInput (){
        $(this).parents(".formulario").remove();
    }
    
  </script>

 
