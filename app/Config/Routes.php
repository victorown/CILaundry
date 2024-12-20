<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// users
$routes->get('register', 'UsersController::register');
$routes->post('register', 'UsersController::regis');
$routes->get('login', 'UsersController::login');
$routes->post('login', 'UsersController::loggedIn');
$routes->get('logout', 'UsersController::logout');
$routes->get('unauthorized', 'UsersController::unauthorized');


$routes->group('admin', ['filter' => 'role:admin'], function($routes){
    $routes->get('dashboard', 'AdminDashboardController::index');

    $routes->get('service', 'ServicesController::index');
    $routes->get('service/create', 'ServicesController::create');
    $routes->post('service/store', 'ServicesController::store');
    $routes->get('service/edit/(:num)', 'ServicesController::edit/$1');
    $routes->post('service/update/(:num)', 'ServicesController::store/$1');
    $routes->get('service/destroy/(:num)', 'ServicesController::destroy/$1');

    $routes->get('orders', 'OrdersController::index');
    $routes->get('orders/detail/(:num)', 'OrdersController::detail/$1');
    $routes->get('orders/approve/(:num)', 'OrdersController::approve/$1');
    $routes->get('orders/reject/(:num)', 'OrdersController::reject/$1');
});

$routes->group('pelanggan', ['filter' => 'role:pelanggan'], function ($routes) {
    $routes->get('dashboard', 'Home::pelanggan');

    $routes->get('product', 'ServicesController::display');
    $routes->get('product/detail/(:num)', 'ServicesController::detail/$1');

    $routes->post('orders/(:num)', 'OrdersController::orders/$1');
    $routes->get('cart', 'OrdersController::cart');
    $routes->get('orders/destroy/(:num)', 'OrdersController::destroy/$1');

    $routes->post('payment', 'PaymentController::payment');
});



// $routes->get('/laundry', 'LaundryController::index');
// $routes->get('/customers', 'CustomerController::index');
// $routes->get('/customers/create', 'CustomerController::create');
// $routes->post('/customers/store', 'CustomerController::store');

$routes->setAutoRoute(true);

