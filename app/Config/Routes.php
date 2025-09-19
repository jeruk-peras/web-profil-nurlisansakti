<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// api
$routes->group('/', function ($routes) {
    $routes->get('', 'PagesController::beranda');
    $routes->get('/beranda', 'PagesController::beranda');

    $routes->get('/bisnis-produk', 'PagesController::bisnis_produk');
    $routes->get('/bisnis-produk/(:any)', 'PagesController::bisnis_produk/$1');

    $routes->get('/faq', 'PagesController::faq');
    $routes->get('/galeri', 'PagesController::galeri');

    $routes->get('/artikel', 'PagesController::artikel');
    $routes->get('/artikel/(:any)', 'PagesController::artikel_detail/$1');
    
    $routes->get('/page/(:any)', 'PagesController::halaman_detail/$1');
    
    $routes->get('/karir', 'PagesController::karir');
    $routes->get('/karir/(:any)', 'PagesController::karir_detail/$1');

    $routes->get('/kontak', 'PagesController::kontak');
});

// api
$routes->group('api', function ($routes) {
    $routes->post('upload-file', 'Serverside\ApiController::upload_image');
    $routes->get('url', 'Serverside\ApiController::url');
    $routes->get('kategori', 'Serverside\ApiController::kategori');
});

// render data
$routes->group('render', function ($routes) {
    $routes->get('menu/(:num)', 'Serverside\RenderController::menu/$1');
    $routes->get('slider', 'Serverside\RenderController::slider');
    $routes->get('service', 'Serverside\RenderController::service');
    $routes->get('bisnis-produk', 'Serverside\RenderController::bisnis_produk');
    $routes->get('faq', 'Serverside\RenderController::faq');
    $routes->get('partner', 'Serverside\RenderController::partner');
    $routes->get('kategori', 'Serverside\RenderController::kategori');
    $routes->get('foto', 'Serverside\RenderController::foto');
    $routes->get('artikel', 'Serverside\RenderController::artikel');
    $routes->get('halaman', 'Serverside\RenderController::halaman');
    $routes->get('karir', 'Serverside\RenderController::karir');
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

    // Halaman routes
    $routes->group('halaman', function ($routes) {
        $routes->get('/', 'Administrator\HalamanController::index');
        
        $routes->get('add', 'Administrator\HalamanController::add');
        $routes->post('add', 'Administrator\HalamanController::save');
        
        $routes->get('(:num)/edit', 'Administrator\HalamanController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\HalamanController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\HalamanController::delete/$1');
    });

    // slider routes
    $routes->group('slider', function ($routes) {
        $routes->get('/', 'Administrator\SliderController::index');
        $routes->post('/', 'Administrator\SliderController::save');
        
        $routes->get('(:num)/edit', 'Administrator\SliderController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\SliderController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\SliderController::delete/$1');
    });

    // Service routes
    $routes->group('service', function ($routes) {
        $routes->get('/', 'Administrator\ServiceController::index');
        $routes->post('/', 'Administrator\ServiceController::save');
        
        $routes->get('(:num)/edit', 'Administrator\ServiceController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\ServiceController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\ServiceController::delete/$1');
    });

    // bisnis routes
    $routes->group('bisnis-produk', function ($routes) {
        $routes->get('/', 'Administrator\BisnisprodukController::index');
        
        $routes->get('add', 'Administrator\BisnisprodukController::add');
        $routes->post('add', 'Administrator\BisnisprodukController::save');
        
        $routes->get('(:num)/edit', 'Administrator\BisnisprodukController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\BisnisprodukController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\BisnisprodukController::delete/$1');
    });

    // faq routes
    $routes->group('faq', function ($routes) {
        $routes->get('/', 'Administrator\FAQController::index');
        $routes->post('/', 'Administrator\FAQController::save');
        
        $routes->get('add', 'Administrator\FAQController::add');
        
        $routes->get('(:num)/edit', 'Administrator\FAQController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\FAQController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\FAQController::delete/$1');
    });

    // Partner routes
    $routes->group('partner', function ($routes) {
        $routes->get('/', 'Administrator\PartnerController::index');
        $routes->post('/', 'Administrator\PartnerController::save');
        
        $routes->get('(:num)/edit', 'Administrator\PartnerController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\PartnerController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\PartnerController::delete/$1');
    });

    // routes kategori galeri
    $routes->group('galeri', function ($routes) {
        // galeri foto
        $routes->get('/', 'Administrator\GaleriController::index');
        $routes->post('/', 'Administrator\GaleriController::save');
        
        $routes->get('(:num)/edit', 'Administrator\GaleriController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\GaleriController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\GaleriController::delete/$1');

        // kategori galeri
        $routes->get('kategori', 'Administrator\GaleriController::kategori');
        $routes->post('kategori', 'Administrator\GaleriController::saveKategori');
        
        $routes->get('(:num)/edit-kategori', 'Administrator\GaleriController::editKategori/$1');
        $routes->post('(:num)/edit-kategori', 'Administrator\GaleriController::updateKategori/$1');
        
        $routes->post('(:num)/delete-kategori', 'Administrator\GaleriController::deleteKategori/$1');
    });

    // artikel routes
    $routes->group('artikel', function ($routes) {
        $routes->get('/', 'Administrator\ArtikelController::index');
        
        $routes->get('add', 'Administrator\ArtikelController::add');
        $routes->post('add', 'Administrator\ArtikelController::save');
        
        $routes->get('(:num)/edit', 'Administrator\ArtikelController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\ArtikelController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\ArtikelController::delete/$1');
    });

    // Karir routes
    $routes->group('karir', function ($routes) {
        $routes->get('/', 'Administrator\KarirController::index');
        
        $routes->get('add', 'Administrator\KarirController::add');
        $routes->post('add', 'Administrator\KarirController::save');
        
        $routes->get('(:num)/edit', 'Administrator\KarirController::edit/$1');
        $routes->post('(:num)/edit', 'Administrator\KarirController::update/$1');
        
        $routes->post('(:num)/delete', 'Administrator\KarirController::delete/$1');
    });

    // Kontak routes
    $routes->group('kontak', function ($routes) {
        $routes->get('/', 'Administrator\KontakController::index');
        $routes->post('/', 'Administrator\KontakController::update');
    });
});
