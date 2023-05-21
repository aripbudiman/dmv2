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
$routes->post('edit_lebar', 'Konfigurasi::updateLebar');
$routes->post('update_bahan', 'Konfigurasi::update_bahan');
$routes->get('/delete_tipe/(:num)', 'Konfigurasi::deleteTipe/$1');
$routes->post('ubah_tipe', 'Konfigurasi::ubah_tipe');


// input
$routes->get('input_pesanan', 'Inputpesanan::index');
$routes->post('load-harga-lebar', 'Inputpesanan::loadlebar');
$routes->post('simpanpesanan', 'Inputpesanan::simpanpesanan');
$routes->get('list_pesanan_verifikasi', 'Inputpesanan::list_pesanan');
$routes->post('load-detail', 'Inputpesanan::detail_pesanan');
$routes->post('delete_pesanan', 'Inputpesanan::delete');

// payment
$routes->get('payment', 'Payment::index');
$routes->post('input_modal_cs', 'Payment::loadcs');
$routes->post('load_troli', 'Payment::load_troli');
$routes->post('post_tmp_payment', 'Payment::postTmpPayment');
$routes->get('load_tmp_payment', 'Payment::loadTmpPayment');
$routes->post('delete_tmp_payment', 'Payment::deleteTmpPayment');
$routes->get('loadListTmpPayment', 'Payment::loadListTmpPayment');
$routes->post('cash_payment', 'Payment::cashPayment');
$routes->get('get_bill', 'Payment::getBill');
$routes->get('history_payment', 'Payment::historyPayment');
$routes->get('get_invoice_cp/(:any)', 'Payment::strukPembayaran/$1');
$routes->get('list_down_payment', 'Payment::listDownPayment');
$routes->get('formPelunasan/(:any)', 'Payment::formPelunasan/$1');
$routes->get('get_invoice_dp/(:any)', 'Payment::strukDp/$1');
$routes->get('loadstruk/(:any)', 'Payment::loadStruk/$1');
$routes->post('bayar_dp', 'Payment::down_payment');
$routes->post('proses_pelunasan', 'Payment::prosesPelunasan');
$routes->get('listTransactions', 'Payment::listTransactions');

//========( get jurnal )========>
$routes->post('getJurnalUmum', 'JurnalController::getJurnalUmum');


// tmp pesanan
$routes->get('list_pesanan', 'TmpPesanan::index');
$routes->post('approve_pesanan', 'TmpPesanan::approve');
$routes->get('pembatalan_pesanan','TmpPesanan::pembatalanPesanan');
$routes->post('proses_pembatalan','TmpPesanan::proses_pembatalan');
$routes->post('setujui_pembatalan','TmpPesanan::batalkan');
$routes->get('tes','TmpPesanan::testQuery');

$routes->get('customer', 'Customer::index');
$routes->post('simpancustomer', 'Customer::simpancustomer');

//========( jurnal )========>
$routes->get('jurnal_umum', 'JurnalController::listJurnalTransaksi');


// akun
$routes->get('akun', 'Akun::index');
$routes->post('/simpanakun', 'Akun::simpanakun');

// transaksi manual
$routes->get('transaksi_manual','TransaksiManual::index');
$routes->get('new_transaksi_manual','TransaksiManual::createNewTransaksiManual');
$routes->post('storeTransaksiManual','TransaksiManual::storeTransaksiManual');
$routes->get('detail_transaksi/(:any)','TransaksiManual::editTransaksiManual/$1');
$routes->post('store_transaksi','TransaksiManual::store_transaksi');
$routes->get('load_tr/(:any)','TransaksiManual::load_tr/$1');
$routes->post('delete_trx_manual','TransaksiManual::delete');
$routes->get('cetak/(:any)','TransaksiManual::cetak/$1');


// laporan
$routes->get('laporan','Laporan::index');
$routes->post('laporan_pendapatan','Laporan::pendapatan');




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
