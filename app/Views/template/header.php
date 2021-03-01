<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PANEL ADMIN</title>

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

  <!-- Datatables -->
<script src="<?php echo base_url('/public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('/public/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<link rel="stylesheet" href="<?php echo base_url('/public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
  <!-- Toastr -->
<link rel="stylesheet" href="<?php echo base_url('/public/plugins/toastr/toastr.min.css');?>">
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
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?php echo base_url('public/dist/img/user1-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Llámame siempre que puedas ... </p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Hace 4 horas</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?php echo base_url('public/dist/img/user8-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Tengo tu mensaje hermano</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Hace 4 horas</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?php echo base_url('public/dist/img/user3-128x128.jpg') ?>" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">El tema va aquí </p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>Hace 4 horas</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Mirar todos los mensajes</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notificaciones</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
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
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('Inicio'); ?>" class="brand-link">
        <img src="<?php echo base_url('public/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $_SESSION['tipo_usuario']; ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
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

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloUsuarios/Permisos') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'Permisos') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle "></i>
                    <p>Permisos</p>
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item <?php echo (isset($modulo_selected) && $modulo_selected == 'Publicaciones') ? 'menu-is-opening menu-open' : ''; ?> ">
              <a href="#" class="nav-link <?php echo (isset($modulo_selected) && $modulo_selected == 'Publicaciones') ? 'active' : ''; ?> ">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                  Publicaciones
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloPublicaciones/CrearPublicacion') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'CrearPublicacion') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>Crear Publicacion</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>" class="nav-link <?php echo (isset($opcion_selected) && $opcion_selected == 'ListarPublicaciones') ? 'active' : ''; ?> ">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>Listar Publicaciones</p>
                  </a>
                </li>

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
                    <p>Historia</p>
                  </a>
                </li>

              </ul>
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