<?php

namespace App\Controllers\Admin;

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

    public function login(){
        echo 'Login form to admin panel';
    }

//END OF A CLASS---------------------------------------------------    
}