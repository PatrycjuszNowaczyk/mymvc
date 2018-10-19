<?php
/**HOW TO ADD A ROUTE
*Firstly add direct routes, because system reads all of
*the routes from the top. To avoid overwrite direct route by
*regular expression route, simply put them at the end of this file.
 */

//direct routes
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