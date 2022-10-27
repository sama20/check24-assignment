<?php

namespace app\controllers;

use app\components\base\Application;
use \app\components\base\Controller as BaseController;
use app\models\Post;

class HomeController extends BaseController {

    public function actionIndex() {
        // TODO: paginationd
        
        $posts = Post::findHome();
        // Application::app()->debug(5555);

        $this->render('views/home/index', ['posts' => $posts]);
    }


   

}
