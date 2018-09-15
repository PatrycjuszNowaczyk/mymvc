<?php

require_once '../app/core/Router.php';

$oRouter = new Router();

// $oRouter->add('',['controller'=>'Home','action'=>'index']);
// $oRouter->add('posts',['controller'=>'Posts','action'=>'index']);
// $oRouter->add('posts/new',['controller'=>'Posts','action'=>'new_post']);
$oRouter->add('{controller}/{action}');
$oRouter->add('{controller}/{id:\d+}/{action}');

var_dump($oRouter->get_routes());

$url = $_SERVER['QUERY_STRING'];
if ($oRouter->is_matched($url)) {
    var_dump($oRouter->get_parameters());
} else {
    echo "Site not found for: " . $url;
}
