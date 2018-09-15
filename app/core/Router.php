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
        $reg_ex = '/^\{([a-z-]+)\}$/';
        $reg_ex_replace = '(?P<\1>[a-z-]+)';
        $route = preg_replace($reg_ex, $reg_ex_replace, $route);
        $route = '/^' . $route . '$/';
        $this->routes[$route] = $params;
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
