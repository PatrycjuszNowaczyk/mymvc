<?php

namespace App\Controllers\Admin;

use Core\View;

class Themes extends \Core\Controller {

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
    View::render('Admin/themes.html');
    }

    public function installThemeAction(){
        include('../../Themes/Forest/theme_config.php');
    }

//END OF A CLASS---------------------------------------------------
}