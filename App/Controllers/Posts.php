<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Post;
class Posts extends \Core\Controller {

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
        $aData['posts'] = Post::getAll();
        // echo '<pre>';
        // var_dump($aData);
        // exit;
        View::render('Posts/index.html', $aData);
    }

    public function addNewAction() {
        View::render('Posts/add-new.html');

    }

    public function editAction() {
        View::render('Posts/edit.html');

    }

//END OF A CLASS---------------------------------------------------
}