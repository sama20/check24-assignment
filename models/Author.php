<?php

namespace app\models;

use app\components\Application;
use app\components\base\Base;
use app\components\base\ModelFactory;

class Author extends Base {

    public static function create() {
        return new Author;
    }

    static function findByUserName($username) {


        $conn = Application::app()->db->conn;
        $sql = "SELECT * FROM author where login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $username
        ]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (null != $row) {
            $author = ModelFactory::create('Author');
            $author->loadAttributes($row);
            return $author;
        }
        return null;
    }

   

}
