<?php

namespace App\Helpers;

class Strings {

public static function getFirstWordQueryString(){
    $sUrl = $_SERVER['QUERY_STRING'];
    $sUrl = explode('/', $sUrl, 2);
    $sUrl = $sUrl[0];
    return $sUrl;
}

}