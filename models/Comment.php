<?php

namespace app\models;

use app\components\base\Model as ModelBase;
use app\components\Application;
use app\components\base\Base;
use app\components\base\ModelFactory;

class Comment extends Base {

    static function create() {
        return ModelFactory::create('Comment');
    }



    static function findByPostId($postId) {

        $conn = Application::app()->db->conn;
        $sql = "SELECT * FROM comment where post_id = ? ORDER BY date_insert DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $postId
        ]);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $out = [];
        foreach ($rows as $row) {

            $comment = ModelFactory::create('Comment');
            $comment->loadAttributes($row);
            $out[] = $comment;
        }


        return $out;
    }


}
