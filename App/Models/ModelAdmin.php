<?php

namespace App\Models;
use PDO;

class ModelAdmin extends \Core\Model {

    public static function pagesGet() {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM pages");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            unset($db, $stmt);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function pageGet() {
        try {
            if (!empty($_GET['page-id'])) {
                $pageId = $_GET['page-id'];
                $db = static::getDB();
                $stmt = $db->query('SELECT * FROM pages WHERE id=\'' . $pageId . '\'');
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                unset($db, $stmt);
                return $result;
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public static function pageSave() {
        try {
            $db = static::getDB();
            if (!empty($_POST['page-name']) && !empty($_POST['page-id'])) {
                $pageName = $_POST['page-name'];
                $id = $_POST['page-id'];
                $time = date("Y-m-d H:i:s");
                $db->query("UPDATE pages SET name = '$pageName' WHERE id = '$id'");
            } elseif (!empty($_POST['page-name'])) {
                $pageName = $_POST['page-name'];
                $db->query("INSERT INTO pages (name) VALUE ('$pageName')");
            }
            unset($db, $_POST);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function pageGetLastAddedPage() {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM pages WHERE time_added=(SELECT max(time_added) FROM pages)");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            unset($db, $stmt);
            return $result;
        } catch (PDOExcception $e) {
            echo $e->getMessage();
        }
    }
    public static function pageGetLastEditedPage() {
        try {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM pages WHERE time_edited=(SELECT max(time_edited) FROM pages)");
            $db == null;
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $result;
        } catch (PDOExcception $e) {
            echo $e->getMessage();
        }
    }

    public static function pageRemove() {
        try {
            $sPageId = $_GET['page-id'];
            $db = static::getDB();
            $db->query('DELETE FROM pages WHERE id=\'' . $sPageId . '\'');
            $db = null;
            unset($_GET, $sPageId);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}