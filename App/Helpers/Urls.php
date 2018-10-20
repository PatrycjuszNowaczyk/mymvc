<?php

namespace App\Helpers;

class Urls {

    public static function isAdminUrl() {
        $sUrl = Strings::getFirstWordQueryString();
        if ($sUrl !== 'admin') {
            return false;
        } else {
            return true;
        }
    }

}