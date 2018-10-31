<?php

namespace App\Models;
use PDO;

class ModelAdmin extends \Core\Model {
    /*METHODS*/
    //-------------------------------------------------------------
    public static function pagesGet() {
        try {
            // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM pages");
            $db = null;
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function pageGet(){
        try{
            if (!empty($_GET['page-id'])){
                $pageId = $_GET['page-id'];
                $db = static::getDB();
                $stmt = $db->query('SELECT * FROM pages WHERE id=\'' . $pageId . '\'' );
                $db = null;
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt = null;
                return $result;
            }

        }
        catch (PDOException $e){
            $e->getMessage();
        }
    }

    public static function pageSave() {
        try{
            $db = static::getDB();
            if (!empty($_POST['page-name'])) {
                $pageName = $_POST['page-name'];
                // var_dump($pageName);
                // exit;
                $db->query("INSERT INTO 
                pages (name) VALUE ('" . $pageName . "')");
                }
                
                $db = null;
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
    }

    public static function pageRemove() {
        try {
            $sPageId = $_GET['page-id'];
            $db = static::getDB();
            $db->query('DELETE FROM pages WHERE id=\'' . $sPageId . '\'');
            $db = null;
            unset($_GET['page-id'], $sPageId);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
//END OF A CLASS---------------------------------------------------
}