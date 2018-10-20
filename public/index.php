<?php

/***************************************************************/
/*This MVC is made thanks Dave Hollingworth tutorial:          */
/*WRITE PHP LIKE A PRO: BUILD A PHP MVC FRAMEWORK FROM SCRATCH */
/***************************************************************/

/*define constant*/
define('APPPATH', 'http://' . $_SERVER['HTTP_HOST'] . '/mymvc/');

/*autoloader for composer, and for system classes*/
require_once(dirname(__DIR__) . '/vendor/autoload.php');

/*autoloader controllers*/
// spl_autoload_register(function ($sClass) {
//     $sRoot = dirname(__DIR__);
//     $sFile = $sRoot . '/' . str_replace('\\', '/', $sClass) . '.php';
//     if (is_readable($sFile)) {
//         require_once $sFile;
//     }
// });

$sUrl = $_SERVER['QUERY_STRING'];
$oRouter = new Core\Router();

//require file with routes
require_once('../Core/routes.php');
$oRouter->dispatch($sUrl);