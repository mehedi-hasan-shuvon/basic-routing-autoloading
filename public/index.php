<?php 
require_once '../autoload.php';

use Project\Router;
use Project\Controllers\HomeController;
use Project\Controllers\UserController;
use Project\Controllers\ProductController;

header("Access-Control-Allow-Origin: http://localhost:8888");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

$router = new Router();

// Define routes
$router->addRoute('/', HomeController::class . '@index');
$router->addRoute('/home/addUser', HomeController::class . '@addUser');
$router->addRoute('/home/fetchUser', HomeController::class . '@fetchUser');
$router->addRoute('/home/deleteUser', HomeController::class . '@deleteUser');
$router->addRoute('/home/goToUpdate/{id}', HomeController::class . '@goToUpdate');

$router->addRoute('/home/updateUser', HomeController::class . '@updateUser');

$router->addRoute('/user/{id}', UserController::class . '@show');


$router->addRoute('/product/{id}/edit', ProductController::class . '@edit');


// Handle the request
$requestUrl = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];


$router->handleRequest($requestUrl, $method);











?>