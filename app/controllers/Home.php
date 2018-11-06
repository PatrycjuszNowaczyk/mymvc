<?php

namespace App\Controllers;
use Core\View;

class Home extends \Core\Controller {

    protected function before() {
        // echo '(before)<br>';
        // return false;
    }

    protected function after() {
        // echo '<br>(after)';
    }

    public function pageAction() {
        View::render('page.html', $aData['page'] = [
            [
                'type' => 'text',
                'url' => 'Elements/Text/text.html',
                'content' => [
                    'header' => 'NaGŁÓWEK TEXT',
                    'text' => 'To jest treść elementu text',

                ],
            ],
            [
                'type' => 'boxes',
                'url' => 'Elements/Boxes/boxes.html',
                'content' => [
                    'header' => 'NaGŁÓWEK BOXES',
                    'text' => 'To jest treść elementu boxes',

                ],
            ],
        ]
        );
    }

}