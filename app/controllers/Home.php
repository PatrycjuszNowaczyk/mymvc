<?php

namespace App\Controllers;

class Home extends \Core\Controller {

    /*METHODS*/
    //-------------------------------------------------------------
    protected function before() {
        echo '(before)<br>';
        // return false;
    }

    protected function after() {
        echo '<br>(after)';
    }

    public function indexAction() {
        echo 'This is index method at Home class.';
    }
}