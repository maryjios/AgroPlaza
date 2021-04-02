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
                            <p><span><i class="fas fa-dollar-sign"></i> </span><?php  echo
                             number_format($publicacion['precio'])?> <?php if ($publicacion['tipo_publicacion']=="PRODUCTO"){ echo " * ".$unidad['cantidad*unidad']. " ".$unidad['abreviatura'];} ?></p>
                        </div>
                      </div>
                      <?php if ($publicacion['tipo_publicacion']=="PRODUCTO"): ?>
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
                      <?php endif ?>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <?php if($publicacion['tipo_publicacion']!="PRODUCTO"){  ?>
                        <h4>Servicio al domicilio:</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <p><span><i class="fas fa-running"></i> </span><?php if ($publicacion['envio']=="NO") {
                            echo "No";
                          }else{
                            echo "Si";
                          }; ?>
                          </p>
                        </div>
                      <?php }else{  ?>
                          <h4>Envio</h4>
                          <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <p><span><i class="fas fa-shipping-fast mr-3"></i></span><?php if ($publicacion['envio']=="NO") {
                              echo "No";
                            }else{
                              echo "Si";
                            }; ?>
                            </p>
                          </div>
                      <?php } ?>
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
                      <div class="tab-pane fade mostrar_pregunta" id="publicacion_pqr" role="tabpanel" aria-labelledby="publicacion_pqr_tab">
                        <?php if ($preguntas != null) { ?>

                          <?php foreach ($preguntas as $pregunta) {?>
                            <div class="div_preguntas" data-pregunta_id="<?php echo $pregunta['id_pregunta'] ?>">
                              <!-- Listado de preguntas -->
                              <div class="direct-chat-msg ">
                                <div class="direct-chat-infos clearfix">
                                  <span class="direct-chat-name float-right"><?php echo $pregunta['nombre_usuario'] ?></span>
                                  <span class="direct-chat-timestamp float-left"><?php echo $pregunta['fecha'] ?></span>
                                </div>
                                <!-- /.direct-chat-infos -->
                                <img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar').'/'.$pregunta['avatar'] ?>" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                  <input class="preg" type="hidden" value="<?php echo $pregunta['id_pregunta'] ?>">
                                  <?php echo $pregunta['pregunta']; ?>
                                </div>
                                <!-- /.direct-chat-text -->
                              </div>
                              <!-- Mensaje de respuesta -->
                              <div class="direct-chat-msg right div_respuesta ">
                                <?php foreach ($respuestas as $respuesta): ?>
                                  <?php if($respuesta['id_pregunta'] == $pregunta['id_pregunta']) {?>
                                    <div class="direct-chat-infos clearfix">
                                      
                                      <span class="direct-chat-timestamp float-left"><?php echo $respuesta['fecha_insert'] ?></span>
                                    </div>
                                    <input type="hidden" id="codigo_respuesta" value="<?php echo $respuesta['id']?>">
                                    <!-- /.direct-chat-infos -->
                                    <img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar/avatar_default.png')?>" alt="message user image">
                                    <!-- /.direct-chat-img -->
                                    
                                    <div class="direct-chat-text campo_respuesta" >
                                      <?php echo $respuesta['descripcion'] ?>
                                    </div>
                                    <?php if($_SESSION['tipo_usuario']!="ADMINISTRADOR") { ?>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                          <button class="dropdown-item editar" >Editar</button>
                                          <button class="dropdown-item eliminar" >Eliminar Pregunta</button>
                                        </div>
                                      </div>
                                    <?php } ?>
                                    <!-- /.direct-chat-text -->
                                  <?php } ?>
                                <?php endforeach ?>                         
                              </div>
                             <?php if($_SESSION['tipo_usuario']!="ADMINISTRADOR") { ?>
                              <button class="btn btn-info btn-sm responder mr-2">Responder</button>
                              <button class="btn btn-sm btn-danger rechazar">Rechazar</button>
                              <div class="div_formulario"></div>
                              <?php } ?>
                              <hr>
                              <hr>
                            </div>
                          <?php } ?> 
                        <?php }else { ?>
                          <h6>Aún no hay preguntas para esta publicación.</h6>
                       <?php } ?>
                      </div>
                      <div class="tab-pane fade overflow-auto "  id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        <?php if($valoraciones != null){ ?>
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
                        <?php }else { ?>
                          <h6>Aún no hay calificaciones para esta publicación.</h6>
                        <?php } ?>
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
  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
      });
      $(".responder").click(abrirInput);   
      $(".rechazar").click(rechazarPregunta); 

      $(".editar").click(editarRespuesta);  
      $(".eliminar").click(eliminar_Pregunta_Respuesta);
      $(".campo_respuesta").each(function(){
       $(this).parent('.div_respuesta').next().remove();
       $(this).parent('.div_respuesta').siblings('.rechazar').remove();
     });
    
    })

    function abrirInput (){

      $(".div_formulario").empty();
      //$(this).parents(".div_preguntas").find('.div_respuesta').addClass('ver_respuesta');
      var id = $(this).parents(".div_preguntas").find('.preg').val();

      input = `<form class="form-horizontal" id="formulario" method="post">
                  <div class="form-group margin-bottom-none row mt-3">
                    <div class="col-sm-6 contenedor">
                      <input  id="id_respuesta" type="hidden" value="`+id+`">
                      <input class="form-control input-sm texto_respuesta" id="texto_respuesta" placeholder="Responder">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success pull-right btn-block btn-sm disabled enviar">Enviar</button>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-danger pull-right btn-block btn-sm cancelar">Cancelar</button>
                    </div>
                  </div>
                </form>`;

      $(this).parents(".div_preguntas").find('.div_formulario').html(input);
      $(".cancelar").click(cerrarInput);
      $(".texto_respuesta").keyup(habilitarEnviar);
      $("#formulario").submit(enviarRespuesta);

    }

    function editarRespuesta (){

      $(".div_formulario").empty();
      $(this).parents(".div_respuesta").find('.campo_respuesta').addClass('act_respuesta');
      var id = $(this).parents(".div_respuesta").find('#codigo_respuesta').val();
      var respuesta = $(this).parents(".div_respuesta").find('.campo_respuesta').text();


      input = `<form class="form-horizontal" id="formulario" method="post">
                  <div class="form-group margin-bottom-none row mt-3">
                    <div class="col-sm-6 contenedor">
                      <input  id="id_respuesta" type="hidden" value="`+id+`">
                      <input class="form-control input-sm texto_respuesta" value="`+respuesta.trim()+`" id="texto_respuesta" placeholder="Responder">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success pull-right btn-block btn-sm  enviar">Enviar</button>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-danger pull-right btn-block btn-sm cancelar">Cancelar</button>
                    </div>
                  </div>
                </form>`;

      $(this).parents(".div_preguntas").find('.div_formulario').html(input);
      $(".cancelar").click(cerrarInput);
      $(".texto_respuesta").keyup(habilitarEnviar);
      $("#formulario").submit(actualizarRespuesta);

    }

    function habilitarEnviar (){
      if ($(this).val()!= "") {
        $(this).parents(".div_preguntas").find('.div_respuesta').addClass('ver_respuesta');
        $(this).parents(".div_preguntas").find('.enviar').removeClass('disabled');

      }else{
        $(this).parents(".div_preguntas").find('.enviar').addClass('disabled');

        clase = $(this).parents(".div_preguntas").find('.enviar').attr('class');

        if (clase.indexOf("disabled") > -1) {
          $(this).parents(".div_preguntas").find('.div_respuesta').removeClass('ver_respuesta');
        }
        
      }
    }

    function cerrarInput (){
      $(this).parents(".div_preguntas").find('.div_respuesta').removeClass('ver_respuesta');
      $(this).parents('.div_preguntas').find(".campo_respuesta").removeClass('act_respuesta');
      $(this).parents("#formulario").remove();
    }

    function enviarRespuesta(e) {

      e.preventDefault();
      id = $("#id_respuesta").val();
      descripcion = $("#texto_respuesta").val();
      var respuesta = "";
      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/RespuestaPregunta');?>',
        type: 'POST',
        dataType: 'json',
        data: {id: id, descripcion: descripcion},
        success: function(data){
          console.log(data)
          if (data!="") {
            respuesta="";

            for (var i = 0; i < data.length; i++) {
              
              respuesta = `<div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"></span>
                      <span class="direct-chat-timestamp float-left">`+data[i].fecha_insert+`</span>
                      </div>
                      <input type="hidden" id="codigo_respuesta" value="`+data[i].id+`">
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar/avatar_default.png')?>" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text campo_respuesta">
                       `+data[i].descripcion+` 
                      </div>
                      <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                          <button class="dropdown-item editar" >Editar</button>
                          <button class="dropdown-item eliminar" >Eliminar Pregunta</button>
                        </div>
                      </div>
                        <!-- /.direct-chat-text -->`;
              
            }
            $(".ver_respuesta").append(respuesta);
          }
          $(".editar").click(editarRespuestaVista);  
          $(".eliminar").click(eliminar_Pregunta_Respuesta);
        }
      });
      

       //$(".ver_respuesta").append(respuesta);
       //$(this).parents(".div_preguntas").find('.div_respuesta').removeClass('ver_respuesta');
       $(this).parents('.div_preguntas').find(".responder").remove();
       $(this).parents('.div_preguntas').find('.rechazar').remove();
       $("#formulario").remove();
      
    }

    function editarRespuestaVista (){

      $(".div_formulario").empty();
      $(this).parents(".div_respuesta").find('.campo_respuesta').addClass('act_respuesta');
      var id =  $(this).parents(".div_respuesta").find('#codigo_respuesta').val(); //('#codigo_respuesta').val();
      var respuesta = $(this).parents(".div_respuesta").find('.campo_respuesta').text();
      

      input = `<form class="form-horizontal" id="formulario" method="post">
                  <div class="form-group margin-bottom-none row mt-3">
                    <div class="col-sm-6 contenedor">
                      <input  id="id_respuesta" type="hidden" value="`+id+`">
                      <input class="form-control input-sm texto_respuesta" value="`+respuesta.trim()+`" id="texto_respuesta" placeholder="Responder">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-success pull-right btn-block btn-sm  enviar">Enviar</button>
                    </div>
                    <div class="col-sm-2">
                      <button type="button" class="btn btn-danger pull-right btn-block btn-sm cancelar">Cancelar</button>
                    </div>
                  </div>
                </form>`;

      $(this).parents(".div_preguntas").find('.div_formulario').html(input);
      $(".cancelar").click(cerrarInput);
      $(".texto_respuesta").keyup(habilitarEnviar);
      $("#formulario").submit(actualizarRespuesta);

    }

    function rechazarPregunta(){
      var id = $(this).parents(".div_preguntas").find('.preg').val();
      

      Swal.fire({
          title: 'Desea rechazar esta pregunta?',
          showCancelButton: true,
          confirmButtonText: `Aceptar`,
        }).then((result) => {
         
          if (result.isConfirmed) {
            $(this).parent(".div_preguntas").addClass('rechazar');
            $.ajax({
              url: '<?php echo base_url('/ModuloPublicaciones/EliminarPregunta');?>',
              type: 'POST',
              dataType: 'text',
              data: {id: id},
            })
            .done(function() {
                $(".rechazar").remove();
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
            
          } 
        })
        
    }

    function actualizarRespuesta(e) {

      e.preventDefault();
      id = $("#id_respuesta").val();
      descripcion = $("#texto_respuesta").val();
      var respuesta = "";
      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/EditarRespuesta');?>',
        type: 'POST',
        dataType: 'text',
        data: {id: id, descripcion: descripcion},
        success: function(data){
          $("#formulario").remove();
        }
      })
      $(".act_respuesta").text(descripcion);
      $(this).parents('.div_preguntas').find(".campo_respuesta").removeClass('act_respuesta');
    
    }


    function eliminar_Pregunta_Respuesta(){
      id_pregunta = $(this).parents(".div_preguntas").find(".preg").val();
      id_respuesta = $(this).parents(".div_preguntas").find("#codigo_respuesta").val();
      data = $(this).parents(".div_preguntas").data('pregunta_id');
      Swal.fire({
          title: 'Desea eliminar esta pregunta?',
          showCancelButton: true,
          confirmButtonText: `Aceptar`,
        }).then((result) => {
         
          if (result.isConfirmed) {
            if (data == id_pregunta) {
              $(this).parents(".div_preguntas").addClass('eliminar');
            }
            
            $.ajax({
              url: '<?php echo base_url('/ModuloPublicaciones/EliminarPregunta_Respuesta');?>',
              type: 'POST',
              dataType: 'text',
              data: {id_pregunta: id_pregunta, id_respuesta:id_respuesta},
            })
            .done(function() {
                $(".eliminar").remove();
                
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
            
          } 
        })
      
    }
  </script>




 
