<?php

namespace App\Models;
use PDO;

class Post extends \Core\Model {

    /*METHODS*/
    //-------------------------------------------------------------
    public static function getAll() {
        try {
            // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM posts');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//END OF A CLASS---------------------------------------------------
}