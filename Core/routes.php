<?php

//normal routes
//site routes
$oRouter->addRoute('', ['controller' => 'home', 'action' => 'index']);
$oRouter->addRoute('posts', ['controller' => 'posts', 'action' => 'index']);

//admin routes
$oRouter->addRoute('admin', ['controller' => 'admin', 'action' => 'login', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/users', ['controller' => 'users', 'action' => 'index', 'namespace' => 'Admin']);

//-------------------------------------------------------------
//regular expression routes
//site routes
$oRouter->addRoute('{controller}/{action}');
$oRouter->addRoute('{controller}/{id:\d+}/{action}');

//admin routes
$oRouter->addRoute('admin/{controller}/{action}', ['namespace' => 'Admin']);