<?php

namespace Core;

class Router {

    /*VARIABLES*/
    //-------------------------------------------------------------
    protected $aRoutes = [];
    protected $aParams = [];
    protected $aMatches = [];

    /*METHODS*/
    //-------------------------------------------------------------


    /*adding next routes*/
    public function addRoute($sRoute, $aParams = []) {
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
        $this->aRoutes[$sRoute] = $aParams;
    }

    /*dispatches current url to right controller and action*/
    public function dispatch($sUrl) {
        $sUrl = $this->removeQueryStringVariables($sUrl);
        // $sUrl = $this->rmvVarUrl($sUrl);
        if ($this->is_matched($sUrl)) {
            $sController = $this->aParams['controller'];
            $sController = $this->convertToStudlyCaps($sController);
            $sController = $this->getNamespace() . $sController;
            if (class_exists($sController)) {
                $oController = new $sController($this->aParams);
                $sAction = $this->aParams['action'];
                $sAction = $this->convertToCamelCase($sAction);
                if (is_callable([$oController, $sAction])) {
                    $oController->$sAction();
                } else {
                    echo "Method [{$sAction}] in [{$sController}] is not collable.";
                }
            } else {
                echo "Controller [{$sController}] doesn't exist.";
            }
        } else {
            echo "This url doesn't match to routes array, so controller {$this->convertToStudlyCaps($sUrl)} doesn't exist.";
        }
    }

    /*checking does url exist in routing table*/
    private function is_matched($sUrl) {
        foreach ($this->aRoutes as $sRoute => $aParams) {
            if (preg_match($sRoute, $sUrl, $aMatches)) {
                foreach ($aMatches as $key => $value) {
                    if (is_string($key)) {
                        $aParams[$key] = $value;
                    }
                }
                $this->aParams = $aParams;
                return true;
            }
        }
        return false;
    }

    /*get namespace for action*/
    private function getNamespace(){
        $sNamespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->aParams)){
            $sNamespace .= $this->aParams['namespace'] . '\\';
        }
        return $sNamespace;
    }

    /*remove query string variables*/
    private function removeQueryStringVariables($sUrl) {
        if ($sUrl != '') {
            $aUrlParts = explode('&', $sUrl, 2);
            if (strpos($aUrlParts[0], '=') === false) {
                $sUrl = $aUrlParts[0];
            } else {
                $sUrl = '';
            }
        }
        return $sUrl;
    }

    /*converts to StudlyCaps*/
    private function convertToStudlyCaps($sConvert) {
        $sConvert = str_replace('-', ' ', $sConvert);
        $sConvert = ucwords($sConvert);
        $sConvert = str_replace(' ', '', $sConvert);
        return $sConvert;
    }

    /*converts to camelCase*/
    private function convertToCamelCase($sConvert) {
        $sConvert = str_replace('-', ' ', $sConvert);
        $sConvert = ucwords($sConvert);
        $sConvert = str_replace(' ', '', $sConvert);
        $sConvert = lcfirst($sConvert);
        return $sConvert;
    }

    /*gets all routes from router*/
    public function get_routes() {
        return $this->aRoutes;
    }

    /*gets parameters from current url*/
    public function get_parameters() {
        return $this->aParams;
    }

//END OF A CLASS---------------------------------------------------
}