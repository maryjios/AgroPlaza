<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Inicio');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/Login', 'Inicio::index');
$routes->get('/Inicio', 'Inicio::cargarVistaInicio');
$routes->get('/Registrar', 'Inicio::RegistrarVendedor');
$routes->get('/InsertarVendedor', 'Inicio::InsertarVendedor');

// Rutas para el modulo de GestionUsuarios
$routes->group('ModuloUsuarios', ['namespace'=>'App\Controllers\ModuloUsuarios'],function($routes){
    $routes->add('RegistrarAdmin', 'RegistrarUsuario::registrarAdmin');
    $routes->add('InsertarAdmin', 'RegistrarUsuario::insertar');
    $routes->add('InsertarMovil', 'RegistrarUsuario::insertarMovil');
    $routes->add('CargarCiudades', 'RegistrarUsuario::cargarCiudadesMovil');
    $routes->add('BuscarUsuarios', 'BuscarUsuarios::index');
    $routes->add('MostrarUsuarios', 'BuscarUsuarios::listarusuarios');
    $routes->add('BuscarusuId', 'BuscarUsuarios::buscarporId');

    $routes->add('BuscarInactivos', 'BuscarInactivos::index');
    $routes->add('MostrarInactivos', 'BuscarInactivos::listarinactivos');

    $routes->add('BuscarPendientes', 'BuscarPendientes::index');
    $routes->add('MostrarPendientes', 'BuscarPendientes::listarpendientes');

    $routes->add('PerfilUsuario', 'PerfilUsuario::index');
});

$routes->group('ModuloPublicaciones', ['namespace'=>'App\Controllers\ModuloPublicaciones'],function($routes){
    $routes->add('ListarPublicaciones', 'ListarPublicaciones::index');
    $routes->add('ConsultarPublicaciones', 'ListarPublicaciones::consultarTodo');
    $routes->add('ConsultaIndividual', 'ListarPublicaciones::consultarId');
    $routes->add('ConsultaDetalle', 'ListarPublicaciones::detallePublicacion');
    $routes->add('EliminarPublicacion', 'ListarPublicaciones::eliminarPublicacion');
    $routes->add('Unidades', 'Unidades::index');
    $routes->add('ConsultarUnidades', 'Unidades::consultarTodo');
    
  ;


});

$routes->group('ModuloPedidos', ['namespace'=>'App\Controllers\ModuloPedidos'],function($routes){
    $routes->add('Pedidos', 'Pedidos::index');
    $routes->add('HistorialPedidos', 'Pedidos::historial');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
