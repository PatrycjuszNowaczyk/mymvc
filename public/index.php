<?php

require_once '../app/core/Router.php';

$oRouter = new Router();

$oRouter->add('',['controller'=>'home','action'=>'index']);
$oRouter->add('posts',['controller'=>'posts','action'=>'index']);
$oRouter->add('{controller}/{action}');
$oRouter->add('{controller}/{id:\d+}/{action}');

echo "Routes table:<br>";
var_dump($oRouter->get_routes());

$url = $_SERVER['QUERY_STRING'];
echo 'Url:<br>';
var_dump($url);
if ($oRouter->is_matched($url)) {
    var_dump($oRouter->get_parameters());
} else {
    echo "Site not found for: " . $url;
}
