<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin', 'Admin\AdminController::index');
$routes->get('/admin/form', 'Admin\AdminController::form');
$routes->get('/admin/table', 'Admin\AdminController::table');

// -- KELOMPOK KATEGORI --
$routes->get('admin/group_category', 'Admin\GroupCategoryController::index');

// ROUTES API CRUD
$routes->group('api', function ($routes) {
    $routes->resource('group-categories', ['controller' => 'Api\GroupCategoryController']);
    $routes->resource('categories', ['controller' => 'Api\CategoryController', 'except' => ['update']]);
    $routes->post('categories/(:num)', 'Api\CategoryController::update/$1');
    $routes->resource('sub-categories', ['controller' => 'Api\SubCategoryController']);
    
    $routes->resource('products', ['controller' => 'Api\ProductController', 'except' => ['update']]);
    $routes->post('products/(:num)', 'Api\ProductController::update/$1');
});
