<?php

namespace Core;

class Router {

    protected $_aRoutes = [];
    protected $_aParams = [];
    protected $_aMatches = [];

    /*adding next routes*/
    public function add($sRoute, $aParams = []) {

        $reg_ex = '/\//';
        $reg_ex_replace = '\\/';
        $sRoute = preg_replace($reg_ex, $reg_ex_replace, $sRoute);
        $reg_ex = '/\{([a-z-]+):([^\}]+)\}/';
        $reg_ex_replace = '(?P<\1>\2)';
        $sRoute = preg_replace($reg_ex, $reg_ex_replace, $sRoute);
        $reg_ex = '/\{([a-z-]+)\}/';
        $reg_ex_replace = '(?P<\1>[a-z-]+)';
        $sRoute = preg_replace($reg_ex, $reg_ex_replace, $sRoute);
        $sRoute = '/^' . $sRoute . '$/';
        $this->routes[$sRoute] = $aParams;
    }

    /*checking does url exist in routing table*/
    public function is_matched($sUrl) {

        $sUrl = preg_replace('/[?&].*/', '', $sUrl);
        foreach ($this->routes as $sRoute => $aParams) {
            if (preg_match($sRoute, $sUrl, $aMatches)) {
                foreach ($aMatches as $key => $value) {
                    if (is_string($key)) {
                        $aParams[$key] = $value;
                    }
                }
                $this->params = $aParams;
                return true;
            }
        }
        return false;
    }

    /*dispatch current url to right controller and action*/
    public function dispatch($sUrl) {

        if ($this->is_matched($sUrl)) {
            $sController = $this->params['controller'];
            $sController = $this->convertToCamelCase($sController);
            $sController = "App\Controllers\\$sController";
            if (class_exists($sController)) {
                $oController = new $sController();
                $sAction = $this->params['action'];
                $sAction = $this->convertToCamelBack($sAction);
                if (is_callable([$oController, $sAction])) {
                    $oController->$sAction();
                } else {
                    echo "Method [{$sAction}] in [{$sController}] is not collable.";
                }
            } else {
                echo "Controller [{$sController}] doesn't exist.";
            }
        } else {
            echo "This url doesn't match to routes array, so controller {$this->convertToCamelCase($sUrl)} doesn't exist.";
        }
    }

    /*convert to CamelCase*/
    public function convertToCamelCase($sConvert) {
        $sConvert = str_replace('-', ' ', $sConvert);
        $sConvert = ucwords($sConvert);
        $sConvert = str_replace(' ', '', $sConvert);
        return $sConvert;
    }

    /*convert to camelBack*/
    public function convertToCamelBack($sConvert) {
        $sConvert = str_replace('-', ' ', $sConvert);
        $sConvert = ucwords($sConvert);
        $sConvert = str_replace(' ', '', $sConvert);
        $sConvert = lcfirst($sConvert);
        return $sConvert;
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
