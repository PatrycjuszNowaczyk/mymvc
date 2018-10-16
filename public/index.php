<?php

/***************************************************************/
/*This MVC is made thanks Dave Hollingworth tutorial:          */
/*WRITE PHP LIKE A PRO: BUILD A PHP MVC FRAMEWORK FROM SCRATCH */
/***************************************************************/

/*autoloader controllers*/
spl_autoload_register(function ($sClass) {
    $sRoot = dirname(__DIR__);
    $sFile = $sRoot . '/' . str_replace('\\', '/', $sClass) . '.php';
    if (is_readable($sFile)) {
        require_once $sFile;
    }
});

/*variables*/
$sUrl = $_SERVER['QUERY_STRING'];

/*objects*/
$oRouter = new Core\Router();

$oRouter->addRoute('', ['controller' => 'home', 'action' => 'index']);
$oRouter->addRoute('posts', ['controller' => 'posts', 'action' => 'index']);
$oRouter->addRoute('admin/{controller}/{action}');
$oRouter->addRoute('{controller}/{action}');
$oRouter->addRoute('{controller}/{id:\d+}/{action}');

$oRouter->dispatch($sUrl);

// added extra comment
// first line
// second line
// third line