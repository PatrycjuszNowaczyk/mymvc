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
$oRouter->addRoute('gallery', ['controller' => 'gallery', 'action' => 'index']);

//admin routes
$oRouter->addRoute('admin', ['controller' => 'admin', 'action' => 'login', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/pages', ['controller' => 'admin', 'action' => 'pages', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/menu', ['controller' => 'admin', 'action' => 'menu', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/settings', ['controller' => 'admin', 'action' => 'settings', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/page-add', ['controller' => 'admin', 'action' => 'page-edit', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/page-edit', ['controller' => 'admin', 'action' => 'page-edit', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/page-remove', ['controller' => 'admin', 'action' => 'page-remove', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/page-save', ['controller' => 'admin', 'action' => 'page-save', 'namespace' => 'Admin']);
$oRouter->addRoute('admin/page-save-back', ['controller' => 'admin', 'action' => 'page-save-back', 'namespace' => 'Admin']);

//-------------------------------------------------------------
//regular expression routes
//site routes
$oRouter->addRoute('{controller}/{action}');
$oRouter->addRoute('{controller}/{id:\d+}/{action}');

//admin routes
// $oRouter->addRoute('admin/{controller}/{action}', ['namespace' => 'Admin']);