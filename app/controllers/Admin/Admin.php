<?php

namespace App\Controllers\Admin;

use Core\View;

class Admin extends \Core\Controller {

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
        View::render('Admin/index.html');
    }
    public function pagesAction(){
        View::render('Admin/pages.html');
    }
    public function loginAction() {
        View::render('Admin/login.html');
    }

    
//END OF A CLASS---------------------------------------------------
}