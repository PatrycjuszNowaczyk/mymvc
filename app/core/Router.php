<?php

class Router
{

    protected $routes = [];
    protected $params = [];

    /*adding next routes*/
    public function add($route, $params)
    {
        $this->routes[$route] = $params;
    }

    /*get all routes from router*/
    public function get_routes()
    {
        return $this->routes;
    }

    /*checking does url exist in routing table*/
    public function is_matched($url)
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /*get parameters from current url*/
    public function get_parameters()
    {
        return $this->params;
    }
}
