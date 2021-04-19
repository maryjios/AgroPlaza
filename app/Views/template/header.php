<?php
if (!isset($_SESSION['tipo_usuario'])) {
  header("Location: " . base_url());
  die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PANEL ADMIN</title>
  <link rel="icon" href="<?php echo base_url('public/dist/agroplaza.ico'); ?>" type="image/ico" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url('/public/dist/css/font.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('/public/dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/daterangepicker/daterangepicker.css') ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('public/plugins/summernote/summernote-bs4.min.css') ?>">

  <!-- jQuery -->
  <script src="<?php echo base_url('/public/plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- sweetalert2 -->
  <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

  <!-- Datatables -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

  <script src="<?php echo base_url('/public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>


  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('/public/plugins/toastr/toastr.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('Inicio') ?>" class="nav-link">INICIO</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="notifi" class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notificaciones</span>
            <div class="dropdown-divider"></div>
            <a type="button" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 nuevos mensajes
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 solicitudes de amigos
              <span class="float-right text-muted text-sm">12 horas</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 nuevos reportes
              <span class="float-right text-muted text-sm">2 días</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Mirar todas las notificaciones</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-success elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Inicio'); ?>" class="brand-link">
        <img src="<?php echo base_url('public/dist/agroplaza.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white;">
        <span class="brand-text font-weight-light"><?php echo ($_SESSION['tipo_usuario'] == "VENDEDOR_ESPECIALISTA") ? "ESPECIALISTA" : $_SESSION['tipo_usuario']; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('public/dist/img/avatar') . '/' . $_SESSION['avatar'] ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?php echo base_url('Inicio/cargarVistaInicio'); ?>" class="d-block"><?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

            <?php if ($_SESSION['tipo_usuario'] == "ADMINISTRADOR") { ?>

              <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Usuarios') ? 'menu-is-opening menu-open' : ''; ?> ">
                <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Usuarios') ? 'active' : ''; ?> ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview  ">

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloUsuarios/RegistrarAdmin') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'RegistrarAdministrador') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-user-plus fa-xs"></i>
                      <p>Registrar Administrador</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'BuscarUsuarios') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-circle "></i>
                      <p>Buscar Usuarios</p>
                    </a>
                  </li>

                </ul>
              </li>

            <?php } ?>

            <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Publicaciones') ? 'menu-is-opening menu-open' : ''; ?> ">
              <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Publicaciones') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Publicaciones
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <?php if ($_SESSION['tipo_usuario'] == "VENDEDOR" || $_SESSION['tipo_usuario'] == "VENDEDOR_ESPECIALISTA") { ?>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloPublicaciones/CrearPublicacion') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'CrearPublicacion') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Crear Publicacion</p>
                    </a>
                  </li>

                <?php } ?>

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'ListarPublicaciones') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>Listar Publicaciones</p>
                  </a>
                </li>

                <?php if ($_SESSION['tipo_usuario'] == "ADMINISTRADOR") { ?>

                  <li class="nav-item">
                    <a href="<?php echo base_url('/ModuloPublicaciones/Unidades') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Unidades') ? 'active' : ''; ?> ">
                      <i class="nav-icon fas fa-circle"></i>
                      <p>Unidades</p>
                    </a>
                  </li>

                <?php } ?>

              </ul>
            </li>

            <!-- Modulo Pedidos -->
            <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Pedidos') ? 'menu-is-opening menu-open' : ''; ?> ">
              <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Pedidos') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                <p>
                  Pedidos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview  ">

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloPedidos/Pedidos') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'PedidosLista') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>Pedidos</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloPedidos/HistorialPedidos') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Historial') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle "></i>
                    <p>Historial</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Perfil') ? 'menu-is-opening menu-open' : ''; ?>">
              <a href="<?php echo base_url('/ModuloUsuarios/PerfilUsuario') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'PerfilUsuario') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Ver Perfil</p>
              </a>
            </li>

            <li class="nav-item ">
              <a href="<?php echo base_url('Inicio/cerrarSession') ?>" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>
                  Cerrar sesion
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script>
      $(document).ready(iniciar);

      function iniciar() {
        $("#notifi").click(abrirNotificaciones);
      }

      function abrirNotificaciones() {
        id_usuario = '<?php echo $_SESSION['id'] ?>'; 
        
        $.ajax({
          url: '<?php echo base_url('/ModuloUsuarios/ListarNotificaciones');?>',
          type: 'POST',
          dataType: 'text',
          data: {id_usuario: id_usuario},
        })
        .done(function(data) {
          console.log(data);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
      }
    </script>