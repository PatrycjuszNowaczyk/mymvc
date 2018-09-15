<?php

class Router
{

    protected $routes = [];
    protected $params = [];

    /*adding next routes*/
    public function add($route)
    {
        $reg_ex = '/\//';
        $reg_ex_replace = '\\/';
        preg_replace($reg_ex, $reg_ex_replace, $route);
        var_dump($route);
        exit;
        $reg_ex = "/^\{([a-z-]+)\}$/";
        $reg_ex_replace = "(?P<\1>[a-z-]+)";
        preg_replace($reg_ex, $reg_ex_replace, $route);
        $route = '/^' . $route . '$/';
        // $this->routes = $route;
        array_push($this->routes, $route);
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
