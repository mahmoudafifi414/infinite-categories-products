<?php
include_once 'vendor/autoload.php';
include_once 'config/database.php';
//include_once 'models/Category.php';
/*include_once 'views/home.html';*/

use config\RouterResolver;

include_once 'controllers/ProductController.php';
include_once 'controllers/HomeController.php';
$router=new RouterResolver();
$router->add('home','HomeController@index');
$router->add('products','ProductController@index');
$router->submit();