<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->get('/', 'User::index');
$routes->get('/home', 'Home::index');
$routes->get('/databarang', 'User::databarang');
$routes->get('/transaksi', 'User::transaksi');
$routes->get('/pengeluaran', 'Home::pengeluaran');
$routes->get('/laporan_barang', 'Home::laporan_barang');
$routes->get('/laporan_peminjaman', 'Home::laporan_peminjaman');
$routes->get('/laporan_pengeluaran', 'Home::laporan_pengeluaran');
$routes->get('/home', 'Home::index', ['filter' => 'ceklogin']);
$routes->get('/adminlab2020', 'Home::adminlab2020');
$routes->get('/registrasi', 'Home::registrasi');
$routes->get('/login_user', 'User::login_user');
$routes->get('/e_complain', 'User::e_complain');
$routes->get('/dosen', 'Home::dosen');
$routes->get('/kategori', 'Home::kategori');
$routes->get('/instansi', 'Home::instansi');
$routes->get('/barang', 'Home::barang');
$routes->get('/laboratorium', 'Home::laboratorium');
$routes->get('/stok_akhir', 'Home::stok_akhir');
$routes->get('/peminjaman', 'Home::peminjaman');
$routes->get('/laporan_barang', 'Home::laporan_barang');
$routes->get('/ecomplain', 'Home::ecomplain');
$routes->get('/profil', 'Home::profil');
$routes->get('/prosespeminjaman', 'Home::prosespeminjaman');
$routes->get('/peminjamanlab', 'Home::peminjamanlab');
$routes->get('/logout', 'Home::logout');
$routes->get('/auth', 'User::auth');
$routes->get('/e_complain_mahasiswa', 'User::e_complain_mahasiswa');
$routes->get('/seting', 'Home::seting');
$routes->get('/user', 'User::index');
$routes->get('/profile', 'User::profile');
$routes->get('/gantipassword', 'User::gantipassword');
$routes->get('/admin', 'User::login_user');
$routes->get('/login', 'User::login_user');
// $routes->get('/(:alpha)', 'User::login_user');
$routes->get('/aslab', 'Aslab::index');
$routes->get('/lab', 'User::lab');
$routes->get('/jadwal_lab', 'Home::jadwal_lab');














/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
