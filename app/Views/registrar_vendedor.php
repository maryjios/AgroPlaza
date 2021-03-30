<?php
if (isset($_SESSION['tipo_usuario'])) {
   header("Location: " . base_url('Inicio'));
   die();
}
?>
<!DOCTYPE html>
<html>

<head lang="es">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>REGISTRO VENDEDOR</title>
   <link rel="icon" href="<?php echo base_url('public/dist/agroplaza.ico'); ?>" type="image/ico" />
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url('public//plugins/fontawesome-free/css/all.min.css') ?>">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css') ?>">

</head>

<body>


   <nav class="navbar navbar-light" style="background-color: #ffe140;">
      <a class="navbar-brand" href="<?php echo base_url() ?>">
         <img src="<?php echo base_url('public/dist/img/logo.png') ?>" alt="" style="margin-top: -3.5em; margin-bottom: -3em;">
      </a>
   </nav>


   <div class="container py-5">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6 mx-auto">

                  <!-- form card login -->
                  <div class="card rounded-0">
                     <div class="card-header">
                        <h3 class="mb-0">Crear Cuenta</h3>
                     </div>
                     <div class="card-body">
                        <form id="formulario_registro" enctype="multipart/form-data" method="post" autocomplete="off">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento de Identidad">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-address-card"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre">
                              <div class="input-group-append mr-2">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>

                              <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-map-marker-alt"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <select name="genero" id="genero" class="form-control">
                                 <option value="0">Seleccione Genero</option>
                                 <option value="MASCULINO">Masculino</option>
                                 <option value="FEMENINO">Femenino</option>
                                 <option value="OTROS">Otro</option>
                              </select>
                           </div>

                           <div class="input-group mb-3">

                              <select name="departamento" id="departamento" class="form-control mr-3  ">
                                 <option value="" disabled selected>Seleccione Departamento</option>

                                 <?php

                                 foreach ($departamentos as $departamentos) { ?>

                                    <option value="<?php echo $departamentos['id'] ?>"><?php echo $departamentos['nombre'] ?></option>

                                 <?php } ?>

                              </select>


                              <select name="ciudad" id="ciudad" class="form-control">
                                 <option value="">Seleccione Ciudad</option>
                              </select>
                           </div>


                           <div class="input-group mb-3">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                              <div class="input-group-append mr-2">
                                 <div class="input-group-text">
                                    <span class="fas fa-unlock"></span>
                                 </div>
                              </div>

                              <input type="password" class="form-control" id="passwordconfirm" placeholder="Confirmar Contraseña">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>


                           <div class="text-center mt-4">
                              <label>¿Que quieres vender?</label>
                           </div>

                           <div class="row text-center mb-5">
                              <div class="col-3">
                                 <div class="form-check">
                                    <input class="form-check-input radio" name="loQueVaAVender" type="radio" value="Productos">
                                    <label class="form-check-label" for="defaultCheck1">
                                       Productos
                                    </label>
                                 </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-4">
                                 <div class="form-check">
                                    <input class="form-check-input radio" name="loQueVaAVender" type="radio" value="Servicios">
                                    <label class="form-check-label" for="defaultCheck1">
                                       Servicios
                                    </label>
                                 </div>
                              </div>

                              <div class="col-5">
                                 <div class="form-check text-left">
                                    <input class="form-check-input radio" name="loQueVaAVender" type="radio" value="Productos y Servicios">
                                    <label class="form-check-label" for="defaultCheck1">
                                       Productos y Servicios
                                    </label>
                                 </div>
                              </div>
                              <!-- /.col -->
                           </div>

                           <div id="datosEspecialista" class="mb-4 mt-2">

                           </div>

                           <div class="row">
                              <div class="col-12">
                                 <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                       Acepto los <a href="#">Terminos y Condiciones</a> y autorizo el uso de mis datos
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div class="row">
                              <div class="col-6">
                                 <div class="icheck-primary">

                                 </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-3">
                                 <a type="button" href="<?php echo base_url(); ?>" class="btn btn-secondary btn-block">Cancelar</a>
                              </div>

                              <div class="col-3">
                                 <button type="submit" id="insertar" class="btn btn-primary aling-right">Continuar</button>
                              </div>
                              <!-- /.col -->
                           </div>

                        </form>
                     </div>
                     <!--/card-block-->
                  </div>
                  <!-- /form card login -->
               </div>
            </div>
            <!--/row-->
         </div>
         <!--/col-->
      </div>
      <!--/row-->
   </div>
   <!--/container-->


   <!-- jQuery -->
   <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url('public/dist/js/adminlte.min.js') ?>"></script>

   <!-- Custument input -->
   <script src="<?php echo base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

   <!-- sweetalert2 -->
   <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

   <script>
   $(document).ready(iniciar);

   function iniciar() {
      $('#ciudad').attr("disabled", true);

      $("#departamento").on('change', elegirDepartamento);

      $("#formulario_registro").submit(formRegistrarVendedor);

      $("input[name='loQueVaAVender']").on('click', mostrarInputFile);

      preview();
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
            alert("ups");
         });
      }
   }

   function mostrarInputFile() {
      valor_seleccionado = $("input[name='loQueVaAVender']:checked").val();

      if (valor_seleccionado != 'Productos' && valor_seleccionado != undefined) {

         datos = `<div class="row">
                     <div class="col-12" id="divProfesion">
                        <label class="ml-2">Titulo de especializacion:</label><br>
                        <input type="text" class="form-control" name="n_especializacion" id="n_especializacion" placeholder="Nombre de la especializacion."></textarea>
                     </div>

                     <div class="col-12 mt-3">
                        <label class="ml-2">Descripción:</label>
                        <textarea class="form-control bg-light" name="descripcion" id="descripcion" class="" cols="30" rows="4" placeholder="Cuentanos a que te dedicas en tu especializacion."></textarea>
                     </div>

                     <div class="col-12 mt-3">
                        <label class="ml-2">Foto de certificado:</label>
                        <input type="file" class="form-control" id="certificado" name="foto_certificado" accept="image/*">
                     </div>

                     <div class="col-12">
                        <p class="text-danger">El formato de la imagen debe ser jpg, png o jpeg</p>
                     </div>
                     
                     <div class="col-4 mt-3 mx-auto">
                        <img id="frame" src="" width="100px" height="100px"/>
                     </div>
                  </div>`;

         $('#datosEspecialista').html(datos);
         $('#datosEspecialista').show();
         $('#frame').hide();
         $('#certificado').on('change', preview);
      } else {
         $('#datosEspecialista').hide();
      }
   }

   function preview() {
      $('#frame').show();
      frame.src = URL.createObjectURL(event.target.files[0]);
   }


   function formRegistrarVendedor(e) {
      e.preventDefault();
      enviarInfoNuevoVendedor();
   }

   function enviarInfoNuevoVendedor() {
      email = $("#email").val();
      documento = $("#documento").val();
      nombres = $("#nombres").val();
      apellidos = $("#apellidos").val();
      direccion = $("#direccion").val();
      telefono = $("#telefono").val();
      genero = $("#genero").val();
      ciudad = $("#ciudad").val();
      password = $("#password").val();
      
      loQueVaAVender = $("input[name='loQueVaAVender']:checked").val();

      if (documento != "" && nombres != "" && apellidos != "" && email != "" && direccion != "" && genero != "" && ciudad != "" && password != "" && loQueVaAVender != undefined) {

         certificado = $("#certificado").val();
         n_especializacion = $("#n_especializacion").val();
         descripcion = $("#descripcion").val();
         
         if (loQueVaAVender == 'Productos' || (certificado != "" && n_especializacion != "" && descripcion != "")) {
            var datos_formulario = new FormData($('#formulario_registro')[0]);

            $.ajax({
               url: '<?php echo base_url('/Inicio/InsertarVendedor'); ?>',
               type: "POST",
               dataType: "text",
               data: datos_formulario,
               contentType: false,
               processData: false
            })
            .done(function(data) {
               console.log(data);

               if (data == "FAIL#DOCUMENTO") {
                  Swal.fire({
                     icon: 'error',
                     title: 'Ya existes',
                     text: 'El número de documento ya está registrado',
                     footer: '<a href="<?php echo base_url(); ?>">Ya tienes tu cuenta? Entonces inicia sesión.</a>'
                  })
               } else if (data == "FAIL#EMAIL") {
                  Swal.fire({
                     icon: 'error',
                     title: 'Ya existes',
                     text: 'El correo electronico ya está registrado',
                     footer: '<a href="<?php echo base_url(); ?>">Ya tienes tu cuenta? Entonces inicia sesión.</a>'
                  })
               } else if (data == "OK#CORRECT#DATA") {
                  if (loQueVaAVender == "Productos") {
                     Swal.fire({
                        title: 'Bienvenido!',
                        text: "Ya has sido registrado en el sistema!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Iniciar Sesión!'
                     }).then((result) => {
                        window.location = "<?php echo base_url(''); ?>";
                     })
                  } else {
                     Swal.fire({
                        title: 'Tu solicitud ha sido enviada!',
                        text: "Para permitir el acceso a especialistas debes esperar a que validen tus datos.",
                        icon: 'warning',
                        footer: 'Por ahora estas "<span class="text-warning"> Pendiente </span>" por revisión. Se paciente.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ir al login'
                     }).then((result) => {
                        window.location = "<?php echo base_url(''); ?>";
                     })
                  }
               } else if (data == "OK#INVALID#DATA") {
                  Swal.fire({
                     icon: 'error',
                     title: 'Ocurrio algo!',
                     text: 'Ha ocurrido un error en el servidor, no se pudo registrar la información.'
                  })
               } else if ("ERROR#TIPO#INCORRECTO") {
                  Swal.fire({
                     icon: 'error',
                     title: 'Archivo no permitido!',
                     text: 'Debes ingresar una imagen con alguno de los formatos especificados.'
                  })
               } else if ("ERROR#SUBIENDO#CERTIFICADO") {
                  Swal.fire({
                     icon: 'error',
                     title: 'No se pudo subir la imagen!',
                     text: 'Por alguna razón la imagen no pudo guardarse. Intentalo de nuevo!'
                  })
               }
            })
            .fail(function(data) {
               Swal.fire({
                  icon: 'error',
                  title: 'Ocurrio algo!',
                  text: 'Ha ocurrido un error en el servidor, no se pudo registrar la información.'
               })
               console.log(data);
            });
         } else {
            Swal.fire({
               icon: 'warning',
               title: 'Faltan datos',
               text: 'Debes llenar todos los campos del formulario'
            })
         }
      } else {
         Swal.fire({
            icon: 'warning',
            title: 'Faltan datos',
            text: 'Debes llenar todos los campos del formulario'
         })
      }
   }
   </script>
   <script>
   $(document).ready(function() {
      bsCustomFileInput.init();
   });
   </script>
</body>

</html>
