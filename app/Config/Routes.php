<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', function ($routes) {
    $routes->resource('group-categories', ['controller' => 'Api\GroupCategory']);
    $routes->resource('categories', ['controller' => 'Api\Category', 'except' => ['update']]);
    $routes->post('categories/(:num)', 'Api\Category::update/$1');
});
