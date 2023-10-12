<?php
class Router {
    private $routes = [];

    public function add($url, $callback, $method = 'GET') {
        $this->routes[] = [
            'url' => $url,
            'callback' => $callback,
            'method' => $method
        ];
    }

    public function route($url, $method) {
        foreach ($this->routes as $route) {
            if ($route['url'] == $url && $route['method'] == $method) {
                return call_user_func($route['callback']);
            }
        }
        return null; // Route not found
    }
}
