<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('saw', 'Home::saw');
$routes->post('Home/simpan', 'Home::simpan');
$routes->get('Home/hapus/(:num)', 'Home::hapus/$1');
$routes->get('Home/edit/(:num)', 'Home::edit/$1'); // Route untuk halaman edit
$routes->post('Home/update/(:num)', 'Home::update/$1');
$routes->post('Home/import', 'Home::import');
$routes->post('Home/hasil_saw', 'Home::hasil_saw');
$routes->get('coba', 'Home::coba');
$routes->post('Home/proses', 'Home::proses');

