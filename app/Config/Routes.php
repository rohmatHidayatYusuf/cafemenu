<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/tambah', 'Kategori::tambah');
$routes->post('kategori/simpan', 'Kategori::simpan');

$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');

$routes->post('kategori/hapus/(:num)', 'Kategori::hapus/$1');

