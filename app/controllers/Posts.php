<?php

namespace App\Controllers;

class Posts extends \Core\Controller {

    /*METHODS*/
    //-------------------------------------------------------------
    public function index() {
        echo 'This is index method at Posts class.';
        echo '<br><pre>';
        echo \htmlspecialchars(print_r($_GET, true));
    }

    public function addNew() {
        echo 'This is addNew method at Posts class.';
    }

    public function edit() {
        echo 'This is edit method at Posts class.<br>';
        echo htmlspecialchars(print_r($this->aParams, true));
    }
}