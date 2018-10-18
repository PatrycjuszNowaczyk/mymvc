<?php

namespace App\Controllers;

class Posts extends \Core\Controller {

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
        echo 'This is index method at Posts class.';
    }

    public function addNewAction() {
        echo 'This is addNew method at Posts class.';
    }

    public function editAction() {
        echo 'This is edit method at Posts class.<br>';
        echo htmlspecialchars(print_r($this->aRouteParams, true));
    }

//END OF A CLASS---------------------------------------------------
}