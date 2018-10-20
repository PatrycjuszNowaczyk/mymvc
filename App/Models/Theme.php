<?php

namespace App\Models;
use PDO;

class Theme extends \Core\Model {

    /*METHODS*/
    //-------------------------------------------------------------
    public static function getThemeUrl() {
        try {
            // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();
            $stmt = $db->query('SELECT url FROM themes JOIN admin ON admin.value = themes.theme');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result[0]['url'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//END OF A CLASS---------------------------------------------------
}