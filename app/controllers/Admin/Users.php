<?php

namespace App\Controllers\Admin;

class Users extends \Core\Controller {

    /*METHODS*/
    protected function before(){
        //make sure an admin user is logged in
    }

    protected function after(){

    }

    public function indexAction(){
        echo 'This is index method in Users class.';
    }

//END OF A CLASS---------------------------------------------------    
}