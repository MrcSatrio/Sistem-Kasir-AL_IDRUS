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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// ------------------------------ Develop Page ------------------------------
// $routes->get('pegawai/insert', 'KepalaKoperasi\Pegawai\Form_pegawai::index');
// $routes->post('pegawai/insert', 'KepalaKoperasi\Pegawai\Form_pegawai::PegawaiInsert');

// ------------------------------ AUTH ------------------------------
$routes->get('/', 'Auth\Login::index');
$routes->post('/login', 'Auth\Login::login');
$routes->get('/logout', 'Auth\Login::logout');


// ------------------------- KEPALA KOPERASI -------------------------
$routes->group('koperasi', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'KepalaKoperasi\Dashboard::index');
    $routes->get('produk/create', 'KepalaKoperasi\Produk\Create::index');
    $routes->post('produk/create', 'KepalaKoperasi\Produk\Create::index');
    $routes->get('produk/list', 'KepalaKoperasi\Produk\Read::index');
    $routes->delete('produk/delete/(:num)',  'KepalaKoperasi\Produk\Delete::index/$1');
    $routes->get('produk/update/(:num)', 'KepalaKoperasi\Produk\Update::index/$1');
    $routes->post('produk/update/', 'KepalaKoperasi\Produk\Update::update');

    $routes->get('brand/create',    'KepalaKoperasi\Brand\Create::index');
    $routes->post('brand/create',   'KepalaKoperasi\Brand\Create::index');
    $routes->get('brand/read',      'KepalaKoperasi\Brand\Read::index');
    $routes->get('brand/update/(:num)',     'KepalaKoperasi\Brand\Update::index/$1');
    $routes->post('brand/update/(:num)',    'KepalaKoperasi\Brand\Update::index/$1');
    $routes->delete('brand/delete/(:num)',  'KepalaKoperasi\Brand\Delete::index/$1');

    $routes->get('kategori/create',    'KepalaKoperasi\Kategori\Create::index');
    $routes->post('kategori/create',    'KepalaKoperasi\Kategori\Create::index');
    $routes->get('kategori/read',      'KepalaKoperasi\Kategori\Read::index');
    $routes->get('kategori/update/(:num)',     'KepalaKoperasi\Kategori\Update::index/$1');
    $routes->post('kategori/update/(:num)',    'KepalaKoperasi\kategori\Update::index/$1');
    $routes->delete('kategori/delete/(:num)',  'KepalaKoperasi\Kategori\Delete::index/$1');

    $routes->get('pegawai/insert', 'KepalaKoperasi\Pegawai\Create::index');
    $routes->post('pegawai/insert', 'KepalaKoperasi\Pegawai\Create::insert');
    $routes->get('pegawai/read',      'KepalaKoperasi\Pegawai\Read::index');
    $routes->delete('pegawai/delete/(:num)',  'KepalaKoperasi\Pegawai\Delete::index/$1');
    $routes->match(['get', 'post'], 'pegawai/update_profile/(:num)', 'KepalaKoperasi\Pegawai\Update::UpdateProfile/$1');
    $routes->match(['get', 'post'], 'pegawai/update_password/(:num)', 'KepalaKoperasi\Pegawai\Update::UpdatePassword/$1');

    $routes->get('riwayat/read', 'KepalaKoperasi\Transaksi\Read::index');
    $routes->get('riwayat/detail/(:num)', 'KepalaKoperasi\Transaksi\Detail::index/$1');

    //Siswa
    $routes->match(['get', 'post'], 'siswa/create', 'KepalaKoperasi\Siswa\Create::index');
    $routes->get('siswa/read',      'KepalaKoperasi\Siswa\Read::index');
    $routes->delete('siswa/delete/(:num)',  'KepalaKoperasi\Siswa\Delete::index/$1');
    $routes->match(['get', 'post'], 'siswa/update_profile/(:num)',    'KepalaKoperasi\Siswa\Update::UpdateProfile/$1');
    $routes->match(['get', 'post'], 'siswa/update_kartu/(:num)',    'KepalaKoperasi\Siswa\Update::UpdateKartu/$1');
    $routes->match(['get', 'post'], 'siswa/update_saldo/(:num)',    'KepalaKoperasi\Siswa\Update::UpdateSaldo/$1');
});

// ------------------------------ KASIR -----------------------------
$routes->group('kasir', ['filter' => 'role'], function ($routes) {
    $routes->get('dashboard', 'Kasir\Dashboard::index');

    $routes->post('get-produk-row', 'Kasir\Get\Produk::index');
    $routes->post('get-member-row', 'Kasir\Get\Member::index');

    $routes->post('transaksi/checkout', 'Kasir\Transaksi\Checkout::index');
    $routes->post('transaksi/topup', 'Kasir\Transaksi\Topup::index');
    $routes->post('transaksi/withdraw', 'Kasir\Transaksi\Withdraw::index');
    $routes->get('checkout/print', 'Kasir\Transaksi\ReceiptPrint::index');
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