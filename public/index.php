<?php

/*include classes*/
require_once '../app/core/Router.php';
require_once '../app/controllers/Posts.php';

/*variables*/
$url = $_SERVER['QUERY_STRING'];

/*objects*/
$oRouter = new Router();

$oRouter->add('', ['controller' => 'home', 'action' => 'index']);
$oRouter->add('posts', ['controller' => 'posts', 'action' => 'index']);
$oRouter->add('admin/{controller}/{action}');
$oRouter->add('{controller}/{action}');
$oRouter->add('{controller}/{id:\d+}/{action}');

$oRouter->dispatch($url);