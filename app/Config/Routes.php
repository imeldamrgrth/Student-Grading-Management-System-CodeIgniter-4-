<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/input_nilai', 'Input_nilai::index');
$routes->get('/data_mhs', 'Data_mhs::index');

// Rute untuk halaman input nilai
$routes->get('/input_nilai', 'Input_nilai::index');

// Rute untuk menyimpan data nilai (POST request)
$routes->post('/input_nilai/simpan', 'Input_nilai::simpan');

$routes->get('/data_mhs/delete/(:num)', 'Data_mhs::delete/$1');

$routes->get('/data_mhs/edit/(:num)', 'Data_mhs::edit/$1'); // Menampilkan form edit
$routes->post('/data_mhs/update/(:num)', 'Data_mhs::update/$1'); // Menyimpan perubahan
