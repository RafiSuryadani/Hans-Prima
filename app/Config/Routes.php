<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin\AdminController::index');
$routes->get('/admin/form', 'Admin\AdminController::form');
$routes->get('/admin/table', 'Admin\AdminController::table');
