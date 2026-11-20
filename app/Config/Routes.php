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


// Menu
$routes->get('menu', 'Menu::index');
$routes->get('menu/tambah', 'Menu::tambah');
$routes->post('menu/simpan', 'Menu::simpan');

$routes->get('menu/edit/(:num)', 'Menu::edit/$1');
$routes->post('menu/update/(:num)', 'Menu::update/$1');

$routes->post('menu/hapus/(:num)', 'Menu::hapus/$1');

$routes->get('tentang', 'Tentang::index');
