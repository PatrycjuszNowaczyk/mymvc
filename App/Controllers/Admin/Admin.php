<?php

namespace App\Controllers\Admin;

use App\Models\ModelAdmin;
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

    public function loginAction() {
        View::render('Admin/login.html');
    }
    public function indexAction() {
        View::render('Admin/index.html');
    }
    public function pagesAction() {
        $aData['pages'] = ModelAdmin::pagesGet();
        View::render('Admin/pages.html', $aData);
        unset($aData);
    }
    public function menuAction() {
        View::render('Admin/menu.html');
    }
    public function settingsAction() {
        View::render('Admin/settings.html');
    }
    public function pageEditAction() {
        $aData['page'] = ModelAdmin::pageGet();
        if (!empty($aData['page'])) {
            View::render('Admin/page_edit.html', $aData);
        } else {
            View::render('Admin/page_edit.html');
        }
        unset($aData);
    }
    public function pageRemoveAction() {
        ModelAdmin::pageRemove();
        $aData['pages'] = ModelAdmin::pagesGet();
        View::render('Admin/pages.html', $aData);
        unset($aData, $_GET);
    }
    public function pageSaveAction() {
        ModelAdmin::pageSave();
        View::render('Admin/page_edit.html');
    }
    public function pageSaveBackAction() {
        ModelAdmin::pageSave();
        $aData['pages'] = ModelAdmin::pagesGet();
        View::render('Admin/pages.html', $aData);
        unset($aData);
    }
//END OF A CLASS---------------------------------------------------
}