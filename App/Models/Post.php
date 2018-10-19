<?php

namespace App\Models;
use PDO;

class Post {

    /*METHODS*/
    //-------------------------------------------------------------
    public static function getAll() {
        $host = 'localhost';
        $dbname = 'mymvc';
        $username = 'root';
        $password = '';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $stmt = $db->query('SELECT * FROM posts');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//END OF A CLASS---------------------------------------------------
}