<?php 

namespace Project\Routes;


use Project\Router;
use Project\Controllers\HomeController;
use Project\Controllers\UserController;
use Project\Controllers\ProductController;

class HomeRoutes{

    public function __construct(){
        $router = new Router();
        // Define routes
        $router->addRoute('/', HomeController::class . '@index');
        $router->addRoute('/home/addUser', HomeController::class . '@addUser');
        $router->addRoute('/home/fetchUser', HomeController::class . '@fetchUser');
        $router->addRoute('/home/deleteUser', HomeController::class . '@deleteUser');
        $router->addRoute('/home/goToUpdate/{id}', HomeController::class . '@goToUpdate');

        $router->addRoute('/home/updateUser', HomeController::class . '@updateUser');

        $router->addRoute('/user/{id}', UserController::class . '@show');


        $requestUrl = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $router->handleRequest($requestUrl, $method);
    }
}



?>