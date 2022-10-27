<?php

namespace app\components\base;

/**
 * Class class to be inherited of controllers
 */
abstract class Controller extends Base {

  
    final public function callAction($actionName) {
        $realName = 'action' . ucfirst($actionName);
        // TODO: we can create a middleware here
        try {
            $this->$realName();
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render($viewFile, $params = []) {

        include $viewFile . '.php';
    }



}

?>
