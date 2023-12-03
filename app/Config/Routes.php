<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/', 'Index::index');
$routes->post('/filter-kategori', 'Index::filter_kategori');

$routes->get('/produk', 'Produk::index', ['filter' => 'auth']);
$routes->Post('/create/produk', 'Produk::store');
$routes->get('/get/produk', 'Produk::getData');
$routes->post('/delete/produk', 'Produk::delete');
$routes->post('/edit/produk', 'Produk::edit');
$routes->post('/update/produk', 'Produk::update');

$routes->get('/kategori', 'Kategori::index', ['filter' => 'auth']);
$routes->Post('/create/kategori', 'Kategori::store');
$routes->get('/get/kategori', 'Kategori::getData');
$routes->post('/delete/kategori', 'Kategori::delete');
$routes->post('/edit/kategori', 'Kategori::edit');
$routes->post('/update/kategori', 'Kategori::update');

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');
$routes->post('/logout', 'Login::logout');

$routes->get('/loginuser', 'LoginUser::index');
$routes->post('/login/authuser', 'LoginUser::auth');
$routes->post('/logoutuser', 'LoginUser::logout');

$routes->get('/register', 'Register::index');
$routes->post('/register/save', 'Register::save');

$routes->get('/registeruser', 'RegisterUser::index');
$routes->post('/register/saveuser', 'RegisterUser::save');
