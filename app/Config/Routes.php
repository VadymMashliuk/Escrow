<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('testUser/(:num)', 'Home::testUser/$1');
$routes->post('testUser/(:num)/create', 'Home::create/$1');
