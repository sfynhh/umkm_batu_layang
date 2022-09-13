<?php

namespace Config;

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
$routes->setDefaultController('Produk');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('Home', 'Home::index');
$routes->get('TentangKami', 'Home::tentangkami');
$routes->get('Contact', 'Home::contact');
$routes->get('Detail_Mitra/(:any)', 'Mitra::detailmitra/$1');
$routes->get('Mitra', 'Mitra::index');
$routes->get('ProdukList/(:any)', 'Produk::produk_all/$1');
$routes->get('ProdukSearch/(:any)/(:any)', 'Produk::produksearch/$1/$2');
$routes->get('Produkjson', 'Produk::produk_json');
$routes->get('Produkdetail/(:any)', 'Produk::detail_produk/$1');

$routes->get('TambahProduk', 'MyProduct::tambah');
$routes->get('UpdateProduk/(:any)', 'MyProduct::updateProduk/$1');

/*
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
