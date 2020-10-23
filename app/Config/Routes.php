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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');


/*$routes->add('codeigniter-4-training','Home::training');
$routes->add('online-training','Home::online');
$routes->add('about','Home::about');
*/
$routes->get('paging/(:num)', 'paging::index/$1');

$myroutes =[];
$myroutes['codeigniter-4-training'] ='Home::training';
$myroutes['online-training'] ='Home::online';
$myroutes['about'] ='Home::about';
$myroutes['register/(:num)/(:alpha)'] = 'Sample::create/$1/$2';
$routes->map($myroutes);

$routes->set404Override(function()
{
    echo view('errors/custom_errors');
});


$routes->group('',['filter'=>'isLoggedIn'],function($routes){
    $routes->get('','dashboard::index');
    $routes->get('index','dashboard::index');
    $routes->get('dashboard/edit','dashboard::edit');
    $routes->get('dashboard/avatar','dashboard::avatar');
    $routes->get('dashboard/login_activity','dashboard::login_activity');
    $routes->get('dashboard/change_password','dashboard::change_password');
    $routes->get('dashboard/edit','dashboard::edit');
});


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
