<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Utama
$routes->get('/', 'Home::index'); // Route untuk halaman utama, memanggil method index di controller Home

// app/Config/Routes.php
// Rute Autentikasi
$routes->get('/login', 'Auth::login'); // GET: Menampilkan form login
$routes->post('/login', 'Auth::login'); // POST: Memproses form login
$routes->get('/register', 'Auth::register'); // GET: Menampilkan form registrasi
$routes->post('/register', 'Auth::register'); // POST: Memproses form registrasi
$routes->get('/logout', 'Auth::logout'); // GET: Proses logout

// Rute Manajemen Tugas
$routes->get('/tugas', 'Tugas::index'); // GET: Menampilkan daftar tugas
$routes->get('/tugas/tambah', 'Tugas::tambah'); // GET: Menampilkan form tambah tugas
$routes->post('/tugas/tambah', 'Tugas::tambah'); // POST: Memproses form tambah tugas
$routes->get('/tugas/edit/(:num)', 'Tugas::edit/$1'); // GET: Menampilkan form edit tugas dengan ID tertentu
$routes->post('/tugas/edit/(:num)', 'Tugas::edit/$1'); // POST: Memproses form edit tugas
$routes->get('/tugas/hapus/(:num)', 'Tugas::hapus/$1'); // GET: Proses penghapusan tugas