<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// static function ($routes)
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->post('/logout', 'AuthController::logout', ['filter' => 'auth']);


// DASHBOARD
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

// KELOLA USERS
$routes->group('users', static function ($routes) {
    $routes->get('', 'UsersController::index');
    $routes->get('tambah', 'UsersController::tambah');
    $routes->post('tambah_user', 'UsersController::tambah_user');
    $routes->get('edit/(:num)', 'UsersController::edit/$1');
    $routes->post('edit_users/(:num)', 'UsersController::edit_users/$1');
    $routes->post('hapus/(:num)', 'UsersController::hapus_users/$1');
});

// KELOLA BARANG
$routes->group('barang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'BarangController::index');
    $routes->get('tambah', 'BarangController::tambah');
    $routes->post('tambah_barang', 'BarangController::tambah_barang');
    $routes->get('edit/(:num)', 'BarangController::edit/$1');
    $routes->post('edit_barang/(:num)', 'BarangController::edit_barang/$1');
    $routes->post('hapus/(:num)', 'BarangController::hapus_barang/$1');
});

// KELOLA KATEGORI BARANG
$routes->group('kategori_barang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'KategoriBarangController::index');
    $routes->get('tambah', 'KategoriBarangController::tambah');
    $routes->post('tambah_kategori', 'KategoriBarangController::tambah_kategori');
    $routes->get('edit/(:num)', 'KategoriBarangController::edit/$1');
    $routes->post('edit_kategori/(:num)', 'KategoriBarangController::edit_kategori/$1');
    $routes->post('hapus/(:num)', 'KategoriBarangController::hapus_kategori/$1');
});

// KELOLA BARANG MASUK
$routes->group('barang_masuk', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'BarangMasukController::index');
    $routes->get('tambah', 'BarangMasukController::tambah');
    $routes->post('tambah_barang_masuk', 'BarangMasukController::tambah_barang_masuk');
});

// KELOLA BARANG KELUAR
$routes->group('barang_keluar', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'BarangKeluarController::index');
    $routes->get('tambah', 'BarangKeluarController::tambah');
    $routes->post('tambah_barang_keluar', 'BarangKeluarController::tambah_barang_keluar');
});


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
