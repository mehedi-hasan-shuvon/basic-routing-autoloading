<?php 
// Router.php
namespace Project;

class Router {
    protected $routes = [];

    public function addRoute($pattern, $handler) {
        $this->routes[$pattern] = $handler;
    }

    public function handleRequest($requestUrl, $method) {
        foreach ($this->routes as $pattern => $handler) {
            $params = $this->matchPattern($pattern, $requestUrl);
            if ($params !== false) {
                $this->callHandler($handler, $params);
                return;
            }
        }

        // Handle 404 Not Found
        $this->handleNotFound();
    }

    protected function matchPattern($pattern, $requestUrl) {
        $pattern = '#^' . $pattern . '$#';

        // Extract parameter names from pattern
        preg_match_all('/\{(\w+)\}/', $pattern, $matches);
        $paramNames = $matches[1];

        // Convert parameter names to regex capture groups
        $pattern = preg_replace('/\{(\w+)\}/', '([^/]+)', $pattern);

        // Match pattern against request URL
        preg_match($pattern, $requestUrl, $matches);

        if (!empty($matches)) {
            $params = [];
            foreach ($paramNames as $index => $paramName) {
                $params[$paramName] = $matches[$index + 1];
            }

            return $params;
        }

        return false;
    }

    protected function callHandler($handler, $params) {
        [$controllerName, $methodName] = explode('@', $handler);

        $controller = new $controllerName();
        $controller->$methodName($params);
    }

    protected function handleNotFound() {
        // Handle 404 Not Found
        // ...
        echo "Route not found!";
        exit;
    }
}


?>