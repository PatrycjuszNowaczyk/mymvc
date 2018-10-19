<?php

namespace App\Controllers\Admin;

use Core\View;

class Admin extends \Core\Controller {

    /*METHODS*/
    protected function before() {
        echo '(before)<br>';
        // return false;
    }

    protected function after() {
        echo '<br>(after)';
    }

    public function indexAction() {
        echo 'This is index action in admin controller';
    }

    public function login() {
        View::render('Admin/login.html');
    }

//END OF A CLASS---------------------------------------------------
}