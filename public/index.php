<?php
/***************************************************************/
/*This MVC is made thanks Dave Hollingworth tutorial:          */
/*WRITE PHP LIKE A PRO: BUILD A PHP MVC FRAMEWORK FROM SCRATCH */
/***************************************************************/
use App\Models\Theme;
use App\Helpers\Strings;
/*autoloader for composer, and for system classes*/
require_once(dirname(__DIR__) . '/vendor/autoload.php');

/*define constant*/
define('APP_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/mymvc/public/');
define('APP_THEME', Theme::getThemeUrl());

$sUrl = $_SERVER['QUERY_STRING'];
$oRouter = new Core\Router();

//require file with routes
require_once('../Core/routes.php');

//follow entered route
$oRouter->dispatch($sUrl);