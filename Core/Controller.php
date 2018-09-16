<?php

namespace Core;

abstract class Controller {

    /*variables*/
    protected $aParams = [];

    /*methods*/
    public function __construct($aParams) {
        $this->aParams = $aParams;
    }
}