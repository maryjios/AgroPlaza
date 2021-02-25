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
$routes->get('/InicioAdmin', 'Inicio::cargarVistaInicio');
$routes->post('/InsertAdmin', 'Administrador::insertar');

// Rutas para el modulo de GestionUsuarios
$routes->group('ModuloUsuarios', ['namespace'=>'App\Controllers\ModuloUsuarios'],function($routes){
    $routes->add('RegistrarAdmin', 'RegistrarAdministrador::registrarAdmin');
    $routes->add('BuscarUsuarios', 'BuscarUsuarios::index');
    $routes->add('PerfilUsuario', 'PerfilUsuario::index');
    $routes->add('Permisos', 'Permisos::index'); 
});

$routes->group('ModuloPublicaciones', ['namespace'=>'App\Controllers\ModuloPublicaciones'],function($routes){
    $routes->add('ListarPublicaciones', 'ListarPublicaciones::index');
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
