<?php

namespace Core;

abstract class Controller {

    /*VARIABLES*/
    //-------------------------------------------------------------
    protected $aRouteParams = [];

    /*METHODS*/
    //-------------------------------------------------------------
    public function __construct($aRouteParams) {
        $this->aRouteParams = $aRouteParams;
    }
}