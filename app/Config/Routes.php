<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//konfigurasi
$routes->get('tipe', 'Konfigurasi::index');
$routes->post('simpantipe', 'Konfigurasi::simpantipe');
$routes->get('bahan', 'Konfigurasi::bahan');
$routes->get('/tampilbahan', 'Konfigurasi::tampilbahan');
$routes->post('/simpanbahan', 'Konfigurasi::simpanbahan');
$routes->post('delete-bahan/(:num)', 'Konfigurasi::delete_bahan/$1');
$routes->get('lebar', 'Konfigurasi::lebar');
$routes->post('/simpan_lebar', 'Konfigurasi::simpanlebar');
$routes->get('/tampillebar', 'Konfigurasi::tampillebar');
$routes->post('/delete_lebar/(:num)', 'Konfigurasi::deletelebar/$1');
$routes->get('/finishing', 'Konfigurasi::finishing');




// input
$routes->get('input_pesanan', 'inputpesanan::index');
$routes->post('load-harga-lebar', 'inputpesanan::loadlebar');
$routes->post('simpanpesanan', 'inputpesanan::simpanpesanan');
$routes->get('list_pesanan_verifikasi', 'inputpesanan::list_pesanan');
$routes->post('load-detail', 'inputpesanan::detail_pesanan');
$routes->post('delete_pesanan', 'inputpesanan::delete');

// payment
$routes->get('payment', 'payment::index');
$routes->post('input_modal_cs', 'payment::loadcs');
$routes->post('load_troli', 'payment::load_troli');
$routes->post('post_tmp_payment', 'payment::postTmpPayment');
$routes->get('load_tmp_payment', 'payment::loadTmpPayment');
$routes->post('delete_tmp_payment', 'payment::deleteTmpPayment');
$routes->get('loadListTmpPayment', 'payment::loadListTmpPayment');
$routes->post('cash_payment', 'payment::cashPayment');
$routes->get('get_bill', 'payment::getBill');
$routes->get('history_payment', 'payment::historyPayment');
$routes->get('get_invoice_cp/(:any)', 'payment::strukPembayaran/$1');
$routes->get('list_down_payment', 'payment::listDownPayment');
$routes->get('formPelunasan/(:any)', 'payment::formPelunasan/$1');
$routes->get('get_invoice_dp/(:any)', 'payment::strukDp/$1');
$routes->get('loadstruk/(:any)', 'payment::loadStruk/$1');
$routes->post('bayar_dp', 'payment::down_payment');
$routes->post('proses_pelunasan', 'payment::prosesPelunasan');
$routes->get('listTransactions', 'payment::listTransactions');

//========( get jurnal )========>
$routes->post('getJurnalUmum', 'jurnalController::getJurnalUmum');


// tmp pesanan
$routes->get('list_pesanan', 'TmpPesanan::index');
$routes->post('approve_pesanan', 'TmpPesanan::approve');

$routes->get('customer', 'Customer::index');
$routes->post('simpancustomer', 'Customer::simpancustomer');

//========( jurnal )========>
$routes->get('jurnal_umum', 'jurnalController::listJurnalTransaksi');


// akun
$routes->get('akun', 'Akun::index');
$routes->post('/simpanakun', 'Akun::simpanakun');

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
