<?php
if (isset($_SESSION['tipo_usuario'])) {
   header("Location: " . base_url('Inicio'));
   die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>INICIO DE SESION</title>
   <link rel="icon" href="<?php echo base_url('public/dist/agroplaza.ico'); ?>" type="image/ico" />

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css'); ?>">

   <style type="text/css">
   body {
      background-image: url('<?php echo base_url('public/dist/img/background-login.jpg') ?>');
      background-repeat: no-repeat;
      background-size: cover;
   }
   </style>
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="card">
         <div class="card-body login-card-body">

            <img class="ml-5 mb-4" src="<?php echo base_url('public/dist/img/logo3.png') ?>" alt="">
            <p class="login-box-msg">INICIAR SESION</p>

            <form id="formulario_ingreso" action="#" method="post">
               <div class="input-group mb-3">
                  <input id="campo_email" type="email" class="form-control" placeholder="Correo Electronico" required autofocus>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input id="campo_password" type="password" class="form-control" placeholder="Contraseña" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary btn-block col-4 float-right">INICIAR</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
               <a href="forgot-password.html">He olvidado mi contraseña</a>
            </p>
            <p class="mb-0">
               <a href="<?php echo base_url('Registrar') ?>" class="text-center">Deseo registrarme!</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js'); ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url('public/dist/js/adminlte.min.js'); ?>"></script>
   <!-- sweetalert2 -->
   <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

   <script type="text/javascript">
   $(document).ready(function() {
      $("#formulario_ingreso").submit(function(event) {
         event.preventDefault();
         validarDatosIngreso();
      });
   });

   function validarDatosIngreso() {
      valor_email = $("#campo_email").val();
      valor_pass = $("#campo_password").val();

      if (valor_email != "" && valor_pass != "") {

         $.ajax({
            url: "<?php echo base_url('Inicio/validarDatosIngreso') ?>",
            type: 'POST',
            dataType: 'text',
            data: {
               email: valor_email,
               password: valor_pass
            },
         })
         .done(function(data) {

            if (data == "OK##DATA##LOGIN") {
               window.location = "<?php echo base_url('Inicio'); ?>";
            } else if (data == "NOT##ACCESS") {
               $("#campo_password").val("");
               Swal.fire({
                  icon: 'warning',
                  title: 'No tienes permitido el acceso!',
                  text: 'Los clientes solo pueden ingresar desde la app movil: Agroplaza'
               })
            } else if (data == "NOT##STATUS") {
               $("#campo_password").val("");
               Swal.fire({
                  icon: 'warning',
                  title: 'Aun sigues pendiente por revision!',
                  text: 'La informacion de tu profesión aun no ha sido revisada.',
                  footer: 'Por favor, ten paciencia...'
               })
            } else {
               $("#campo_password").val("");
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'No se pudo encontrar el usuario',
                  footer: '<a href="<?php echo base_url('Registrar'); ?>">Todavia no tienes una cuenta? Registrate!.</a>'
               })
            }

         })
         .fail(function(data) {
            console.log("error");
            console.log(data);
         });

      } else {
         Swal.fire({
            icon: 'warning',
            title: 'Campos vacios!',
            text: 'Debes llenar todos los campos.'
         })
      }
   }
   </script>

</body>

</html>
