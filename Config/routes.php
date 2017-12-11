<?php
include_once 'vendor/autoload.php';
include_once 'config/database.php';
//include_once 'models/Category.php';
/*include_once 'views/home.php';*/

use config\RouterResolver;

include_once 'controllers/ProductController.php';
include_once 'controllers/CategoryController.php';
include_once 'controllers/HomeController.php';
include_once 'controllers/UserController.php';
include_once 'controllers/FileUpload.php';
include_once 'controllers/NavController.php';
$router = new RouterResolver();
$router->add('/', 'HomeController@index');
//products routes
$router->add('products/all', 'ProductController@index');
$router->add('products/store', 'ProductController@store');
$router->add('products/edit', 'ProductController@edit');
$router->add('products/update', 'ProductController@update');
$router->add('products/delete/id', 'ProductController@delete');
//categories routes
$router->add('categories/all', 'CategoryController@index');
$router->add('categories/store', 'CategoryController@store');
$router->add('categories/delete/id', 'CategoryController@delete');
$router->add('categories/edit', 'CategoryController@edit');
$router->add('categories/update', 'CategoryController@update');
//user routes
$router->add('user/login', 'UserController@login');
$router->add('user/register', 'UserController@register');
$router->add('user/logout', 'UserController@logout');
$router->add('user/checkSession', 'UserController@checkSession');
$router->add('user/checkCookie', 'UserController@checkCookies');
//file routes
$router->add('fileupload', 'FileUpload@uploadFile');
$router->submit();