<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// api
$routes->group('api', function ($routes) {
    $routes->get('menu123', 'Administrator\Home::index');
});

// sideserver
$routes->group('sideserver', function ($routes) {
    $routes->get('menu123', 'Administrator\Home::index');
});

// administrator
$routes->group('adm', function ($routes) {
    $routes->get('menu', 'Administrator\Home::index');

    $routes->group('administrator', function ($routes) {
        $routes->get('menu123', 'Administrator\Home::index');
    });
});
