<?php

namespace app\models;

use app\components\base\Model as BaseModel;
use app\components\Application;
use app\components\base\Base;
use app\components\base\ModelFactory;

/**
 * ORM Representing POST
 */
class Post extends Base{

    public static function create() {
        return ModelFactory::create('Post');
    }

    public function validate() {



        return true;
    }

    static function findHome() {

        $conn = Application::app()->db->conn;
        $sql = 'SELECT p.id as id, p.title as title,'
        . ' p.description as description, '
        . ' date_insert, a.name as author '
        . ' FROM post p, author a '
        . ' WHERE p.author_id = a.id and p.date_publication < NOW()'
        . ' ORDER BY date_publication desc';
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $out = [];
        foreach ($rows as $row) {
            
            $post = ModelFactory::create('Post');
            $post->loadAttributes($row);
            
            $post->comments = [];
            $comments = Comment::findByPostId($post->id);
            // Application::app()->debug($comments);
            $post->comments = $comments;
            $out[] = $post;
        }


        return $out;
    }

}
