<?php 

namespace Project;

class Router {
    protected $routes = [];

    public function addRoute($pattern, $handler) {
        $this->routes[$pattern] = $handler;
    }

    public function handleRequest($requestUrl, $method) {
        foreach ($this->routes as $pattern => $handler) {
            if ($this->matchPattern($pattern, $requestUrl, $method)) {
                $this->callHandler($handler);
                return;
            }
        }

        // Handle 404 Not Found
        $this->handleNotFound();
    }

    protected function matchPattern($pattern, $requestUrl, $method) {
        if (preg_match('/^' . $pattern . '$/', $requestUrl, $matches)) {
            if ($method === 'GET' && !empty($matches['posted'])) {
                return false;
            } elseif ($method === 'POST' && !empty($matches['get'])) {
                return false;
            }

            return true;
        }

        return false;
    }

    protected function callHandler($handler) {
        [$controllerName, $methodName] = explode('@', $handler);

        $controller = new $controllerName();
        $controller->$methodName();
    }

    protected function handleNotFound() {
        // Handle 404 Not Found
        // ...
    }
}



?>