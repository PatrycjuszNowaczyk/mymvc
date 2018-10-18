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


/*methods and actions*/
require_once('./routes.php');
echo '<pre>';
$oRouter->dispatch($sUrl);