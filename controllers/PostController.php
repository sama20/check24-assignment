<?php

namespace app\controllers;

use \app\components\base\Controller as BaseController;
use \app\components\base\ModelFactory;
use app\models\Post;
use app\models\Comment;
use app\components\Auth;

class PostController extends BaseController {

    // protected function beforeAction($actionName) {
    //     parent::beforeAction($actionName);

    //     if ($actionName == 'actionCreate' && !Auth::isLogged()) {
    //         //TODO Add Flash message here
    //         $this->redirect('home/index');
    //     }

    //     if ($actionName == 'actionDelete' && !Auth::isLogged()) {
    //         //TODO Add Flash message here
    //         $this->redirect('home/index');
    //     }
    // }

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

        $post = ModelFactory::create('Post');

        // Postback
        if ($_POST['post'] /*TODO: CSRF should add*/) {

            $post = ModelFactory::create('Post');
            $post->loadAttributes($_POST['post']);
            $post->author_id = 1;
            if ($post->save()) {
                //TODO Set a flash message here.
                $this->redirect('post/detail&id=' . $post->id);
            }
        }
        $this->render('views/post/create', ['post' => $post]);
    }

    public function actionUpdate() {

        $id = $_GET['id'];
        $post = Post::find($id);

        // Postback
        if ($_POST['post'] /*TODO: CSRF should add here*/) {

            $post->loadAttributes($_POST['post']);
            $post->author_id = 1;
            if ($post->save()) {
                //TODO Set a flash message here.
                $this->redirect('post/detail&id=' . $post->id);
            }
        }
        $this->render('views/post/update', ['post' => $post]);
    }

    public function actionDelete() {

        $id = $_POST['id'];
        $authorId = Auth::getSession('id');
        // check auth
        $post = Post::find($id);
        if ($post->isOwner($authorId)) {
            
            foreach($post->comments as $comment){
                 Comment::delete($comment->id);
            }
            
            Post::delete($id);
        }

        $this->redirect('home/index');
    }

}
