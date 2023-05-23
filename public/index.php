<?php 
require_once '../autoload.php';

use Project\Router;
use Project\Controllers\HomeController;
use Project\Controllers\UserController;
use Project\Controllers\ProductController;


$router = new Router();

// Define routes
$router->addRoute('/', HomeController::class . '@index');
$router->addRoute('/user/{id}', UserController::class . '@show');
$router->addRoute('/product/{id}/edit', ProductController::class . '@edit');


// Handle the request
$requestUrl = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$router->handleRequest($requestUrl, $method);











?>