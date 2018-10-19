<?php

namespace App\Controllers;
use Core\View;

class Home extends \Core\Controller {

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
        View::render('Home/index.html', [
            'template' => 'base.html',
            'elements' => [
                'one' => 'Elements/Posts/posts.html',
                'two' => 'Elements/Galleries/gallery.html',
                'three' => 'Elements/Boxes/boxes.html'
            ]
        ]);
    }

//END OF A CLASS---------------------------------------------------
}