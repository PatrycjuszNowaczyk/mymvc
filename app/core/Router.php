<?php

class Router {

    protected $_routes = [];
    protected $_params = [];
    protected $_matches = [];

    /*adding next routes*/
    public function add($route, $params = []) {

        $reg_ex = '/\//';
        $reg_ex_replace = '\\/';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $reg_ex = '/\{([a-z-]+):([^\}]+)\}/';
        $reg_ex_replace = '(?P<\1>\2)';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $reg_ex = '/\{([a-z-]+)\}/';
        $reg_ex_replace = '(?P<\1>[a-z-]+)';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $route = '/^' . $route . '$/';
        $this->routes[$route] = $params;
    }

    /*checking does url exist in routing table*/
    public function is_matched($url) {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /*dispatch current url to right controller and action*/
    public function dispatch($url) {

        if ($this->is_matched($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToCamelCase($controller);
            if (class_exists($controller)) {
                $oController = new $controller();
                $action = $this->params['action'];
                $action = $this->convertToCamelBack($action);
                if (is_callable([$oController, $action])) {
                    $oController->$action();
                } else {
                    echo "Method [{$action}] in [{$controller}] is not collable.";
                }
            } else {
                echo "Controller [{$controller}] doesn't exist.";
            }
        } else {
            echo "This url doesn't match to routes array, so controller {$this->convertToCamelCase($url)} doesn't exist.";
        }
    }

    /*convert to CamelCase*/
    public function convertToCamelCase($convert) {
        $convert = str_replace('-', ' ', $convert);
        $convert = ucwords($convert);
        $convert = str_replace(' ', '', $convert);
        return $convert;
    }

    /*convert to camelBack*/
    public function convertToCamelBack($convert) {
        $convert = str_replace('-', ' ', $convert);
        $convert = ucwords($convert);
        $convert = str_replace(' ', '', $convert);
        $convert = lcfirst($convert);
        return $convert;
    }

    /*get all routes from router*/
    public function get_routes() {
        return $this->routes;
    }

    /*get parameters from current url*/
    public function get_parameters() {
        return $this->params;
    }
}
