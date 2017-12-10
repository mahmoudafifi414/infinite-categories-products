<?php
include_once 'vendor/autoload.php';
include_once 'config/database.php';
//include_once 'models/Category.php';
/*include_once 'views/home.html';*/

use config\RouterResolver;

include_once 'controllers/ProductController.php';
include_once 'controllers/CategoryController.php';
include_once 'controllers/HomeController.php';
include_once 'controllers/UserController.php';
$router = new RouterResolver();
$router->add('home', 'HomeController@index');

//products routes
$router->add('products/all', 'ProductController@index');
$router->add('products/store', 'ProductController@store');
$router->add('products/update', 'ProductController@update');
$router->add('products/delete/id', 'ProductController@delete');
//categories routes
$router->add('categories/all', 'CategoryController@index');
$router->add('categories/store', 'CategoryController@store');
$router->add('categories/delete/id', 'CategoryController@delete');
//user routes
$router->add('user/login', 'UserController@login');
$router->add('user/register', 'UserController@register');
$router->submit();