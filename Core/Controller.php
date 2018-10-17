<?php

namespace Core;

abstract class Controller {

    /*VARIABLES*/
    //-------------------------------------------------------------
    protected $aRouteParams = [];

    /*METHODS*/
    //-------------------------------------------------------------
    protected function before() {
    }

    protected function after() {
    }

    public function __construct($aRouteParams) {
        $this->aRouteParams = $aRouteParams;
    }

    public function __call($sMethod, $aArgs) {
        $sMethod = $sMethod . 'Action';
        if ($this->before() !== false) {
            call_user_func_array([$this, $sMethod], $aArgs);
            $this->after();
        }
    }

}