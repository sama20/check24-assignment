<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use \app\components\base\ModelFactory;
use app\models\Post;
use app\models\Comment;

class PostController extends BaseController {



    public function actionDetail() {
        $id = $_GET['id'];

        $comment = ModelFactory::create('Comment');

        // Postback
        if (isset($_POST['comment']) && $_POST['comment'] /*TODO: CSRF should add here*/) {

            $comment = ModelFactory::create('Comment');
            $comment->loadAttributes($_POST['comment']);
            $comment->post_id = $id;
            if ($comment->save()) {
                //TODO: Set a flash message here.
                $this->redirect('post/detail&id=' . $id);
            }
        }
        $post = Post::find($id);

        $this->render('views/post/detail', ['post' => $post, 'comment' => $comment]);
    }

    public function actionCreate() {

  
        //TODO: complate the action
    }

    public function actionUpdate() {

        //TODO: complate the action
    }

    public function actionDelete() {

        //TODO: complate the action
    }

}
