<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// api
$routes->group('api', function ($routes) {
    $routes->get('url', 'Serverside\ApiController::url');
});

// render data
$routes->group('render', function ($routes) {
    $routes->get('menu/(:num)', 'Serverside\RenderController::menu/$1');
});

// datatables
$routes->group('datatables', function ($routes) {
    $routes->post('menu', 'Serverside\DatatablesController::menu');
});

// administrator
$routes->group('adm', function ($routes) {

    // menu routes
    $routes->group('menu', function ($routes) {
        $routes->get('/', 'Administrator\MenuController::index');
        $routes->post('/', 'Administrator\MenuController::save');
        $routes->post('order-data', 'Administrator\MenuController::orderData');
        
        $routes->get('(:num)/edit', 'Administrator\MenuController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\MenuController::update/$1');
        
        $routes->get('(:num)/submenu', 'Administrator\MenuController::submenu/$1');
        $routes->post('(:num)/submenu', 'Administrator\MenuController::save/$1');

        $routes->post('(:num)/delete', 'Administrator\MenuController::delete/$1');
    });
});
