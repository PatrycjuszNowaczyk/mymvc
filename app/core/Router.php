<?php

class Router
{

    protected $routes = [];
    protected $params = [];
    protected $matches = [];

    /*adding next routes*/
    public function add($route, $params = [])
    {
        $reg_ex = '/\//';
        $reg_ex_replace = '\\/';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $reg_ex = '/\{([a-z-]+)\}/';
        $reg_ex_replace = '(?P<\1>[a-z-]+)';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $route = '/^' . $route . '$/';
        $this->routes[$route] = $params;
    }

    /*checking does url exist in routing table*/
    public function is_matched($url)
    {
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

    /*get all routes from router*/
    public function get_routes()
    {
        return $this->routes;
    }

    /*get parameters from current url*/
    public function get_parameters()
    {
        return $this->params;
    }
}
