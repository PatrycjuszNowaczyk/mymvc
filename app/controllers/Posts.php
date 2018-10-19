<?php

namespace App\Controllers;
use \Core\View;

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
        View::render('Posts/index.html');
    }

    public function addNewAction() {
        View::render('Posts/add-new.html');

    }

    public function editAction() {
        View::render('Posts/edit.html');

    }

//END OF A CLASS---------------------------------------------------
}