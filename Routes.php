<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'home::index');
$routes->get('/parkir', 'parkir::index'); // menu parkir
$routes->post('/simpan', 'parkir::simpan');
$routes->get('/keluar/(:num)', 'parkir::keluar/$1');
$routes->get('/penghasilan', 'parkir::penghasilan');
$routes->post('/penghasilan/filter', 'parkir::filterPenghasilan');
$routes->get('/cari', 'parkir::cari');