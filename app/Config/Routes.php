<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Admin\AdminController::index');
$routes->get('/admin/form', 'Admin\AdminController::form');
$routes->get('/admin/table', 'Admin\AdminController::table');

$routes->group('api', function ($routes) {
    $routes->resource('group-categories', ['controller' => 'Api\GroupCategory']);
    $routes->resource('categories', ['controller' => 'Api\Category', 'except' => ['update']]);
    $routes->post('categories/(:num)', 'Api\Category::update/$1');
    $routes->resource('sub-categories', ['controller' => 'Api\SubCategory']);
});
