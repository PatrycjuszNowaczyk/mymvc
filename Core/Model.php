<?php

namespace Core;
use App\Config;
use PDO;

global $db;
abstract class Model {

    protected static function getDB() {
        $db = null;
        if ($db === null) {
            try {
                $db = new PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME . ";charset=utf8", Config::DB_USER, Config::DB_PASS);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}