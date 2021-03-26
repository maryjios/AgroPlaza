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
                        <i class="far fa-edit"></i>
                        Editar Publicación
                        <span class="text-secondary font-weight-bold small mt-1"> (todos los campos son obligatorios)</span>
                     </p>
                     <div class="d-grid d-md-flex  justify-content-md-end">
                     <a class=" btn btn-info mr-4" href="<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>"><i class="fas fa-chevron-circle-left"></i>
                        Volver
                     </a>
                </div>
                  </div>
                  
                  <div class="card-body">
                     <form enctype="multipart/form-data" method="post" id="editar_publicacion">
                        <input type="hidden" id="tipoUser" name="tipoUser" value="<?php echo $_SESSION['tipo_usuario']; ?>">
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">

                        <div class="row">
                           <div class="col-md-3">
                              <p class="float-right text-secondary">Titulo :</p>
                           </div>
                           <div class="col-md-9">
                              <input type="hidden" name="id_publicacion" value="<?php echo $publicacion['id'] ?>">
                              <input type="text" value="<?php echo $publicacion['titulo'] ?>" name="titulo" id="titulo" class="form-control" required>
                           </div>
                        </div>
                        <br>
                        <div class="row">
                           <div class="col-md-3">
                              <p class="float-right">Descripción del Producto :</p>
                           </div>
                           <div class="col-md-9"> <input type="text" value="<?php echo $publicacion['descripcion'] ?>" name="descripcion" id="descripcion" class="form-control" required> </div>
                        </div>
                        <br>

                        <div class="row">
                           <div class="col-md-3">
                              <p class="float-right">Ubicacion :</p>
                           </div>
                           <div class="col-md-3">
                              <select name="departamento" id="departamento" class="form-control">
                                 <?php
                                    foreach ($departamentos as $departamentos) { ?>
                                       <option value="<?php echo $departamentos['id']?>"<?php if($departamentos['id']==$id_departamento['id_departamento']) { echo 'selected'; } ?>><?php echo $departamentos['nombre'] ; ?>
                                       </option>
                                 <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <select name="ciudad" id="ciudad" class="form-control">
                                 <?php
                                    foreach ($ciudades as $ciudades) { ?>
                                       <option value="<?php echo $ciudades['id']?>"<?php if($ciudades['id']==$id_ciudad['id_ciudad']) { echo 'selected'; } ?>><?php echo $ciudades['nombre'] ; ?>
                                       </option>
                                 <?php } ?>
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
                                    <?php if ($publicacion['tipo_publicacion'] == 'SERVICIO') { ?>
                                      <option value="SERVICIO" selected>Servicio</option>
                                      <option value="PRODUCTO">Producto</option>
                                    <?php }else { ?>
                                       <option value="PRODUCTO" selected>Producto</option>
                                       <option value="SERVICIO" >Servicio</option>
                                    <?php } ?>
                                 <?php }else {  ?>
                                     <option value="PRODUCTO">Producto</option>
                                 <?php } ?>
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
                                 <input type="text" class="form-control" value="<?php echo $publicacion['precio'] ?>" id="precio" name="precio" id="precio">
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
                                 <input type="text" value="<?php echo $publicacion['descuento'] ?>" class="form-control" placeholder="Opcional" name="descuento" id="descuento">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-3">
                              <p class="float-right">Ofrecer envio :</p>
                           </div>
                           <div class="col-md-9">
                              <div class="custom-control custom-switch">
                                 <input type="checkbox" name="envio" class="custom-control-input" id="envio" value="" <?php if($publicacion['envio']=='SI') { echo 'checked'; } ?>>
                                 <label class="custom-control-label" for="envio"></label>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="col-md-12" align="center">
                           <input id="fotos" type="file" name="fotos[]" multiple="multiple" accept="image/*" />
                           <p class="text-danger">Puedes seleccionar varias imagenes.</p>
                           <hr />
                           <b>Vista Previa</b>
                           <br />
                           <br />
                           <div id="dvPreview">
                              <?php 
                                 $path = "./public/dist/img/publicaciones/publicacion".$publicacion['id'];
                                 if (file_exists($path)) {
                                    $directorio = opendir($path);
                                    while ($archivo = readdir($directorio)) {
                                       if (!is_dir($archivo)) { ?>
                                          <div class=" d-inline mr-5">
                                            <a href="#"><i class="far fa-trash-alt "></i></a>
                                             <img  class="rounded" style="width: 100px;" src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$archivo ?>"> 
                                          </div>
                                          
                                    <?php }
                                    }
                                 }

                              ?>
                           </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Actualizar</button>
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
   $("#departamento").on('change', elegirCiudad);
   $("#editar_publicacion").submit(formEditarPublicacion);
   $("#envio").click(comprobarCheck);
   esconderStock();
   $("#tipo_producto").click(esconderStock);
}

function elegirCiudad() {
   alert("cidudad")
   let departamento = $(this).val();
   var ciudades = $("#ciudad");
 
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
   if (tipo == "PRODUCTO") {
      var stock = `<div class="row">
                     <div class="col-md-3">
                        <p class="float-right text-secondary">Stock :</p>
                     </div>
                     <div class="col-md-9">
                        <input type="number" value="<?php echo $publicacion['stock'] ?>" name="stock" id="stock" class="form-scontrol" required> 
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-3">
                        <p class="float-right">Unidad :</p>
                     </div>
                     <div class="col-md-9">
                        <select name="unidad" id="unidad" class="form-control">
                           <?php foreach ($unidades as $unidad) { ?>
                              <option value=" <?php echo $unidad['id'] ?>" <?php if($unidad['id']==$id_unidad['id_unidad']) { echo 'selected'; } ?>><?php echo $unidad['nombre'] ?></option>
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

function formEditarPublicacion(e) {
   e.preventDefault();
   titulo = $("#titulo").val();
   descripcion = $("#descripcion").val();
   precio = $("#precio").val();

   if (titulo != "" && descripcion != "" && precio != "") {
      var datos_formulario = new FormData($('#editar_publicacion')[0]);

      $.ajax({
         url: '<?php echo base_url('/ModuloPublicaciones/ActualizarPublicacion') ?>',
         type: "POST",
         dataType: "text",
         data: datos_formulario,
         contentType: false,
         processData: false,
         
      })
      .done(function(data) {
         console.log(data);

         if (data == "Ok##actualizo") {
            Swal.fire({
               icon: 'success',
               title: 'Exitoso!',
               text: 'La publicacion ha sido registrada con exito.'
            })

            setTimeout(function() {
               window.location = "<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>";
            },2000); 

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
