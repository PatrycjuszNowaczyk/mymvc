<?php

namespace App\Controllers\Admin;

class Users extends \Core\Controller {

    /*METHODS*/
    //-------------------------------------------------------------
    protected function before() {
        // echo '(before)<br>';
        // return false;
    }

    protected function after() {
        // echo '<br>(after)';
    }

    public function indexAction() {
        echo 'This is index method in Users class.';
    }

//END OF A CLASS---------------------------------------------------
}