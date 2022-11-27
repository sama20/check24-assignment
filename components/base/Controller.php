<?php

namespace app\components\base;

/**
 * Class class to be inherited of controllers
 */
abstract class Controller extends Base {

    /**
     * Method to be overload if need for example filter the autorization of user
     * @param type $actionName
     */
    protected function beforeAction($actionName) {
        
    }

  
    final public function callAction($actionName) {
        $realName = 'action' . ucfirst($actionName);
        if (is_callable([$this, $realName])) {
            $this->beforeAction($realName);
            $this->$realName();
        } else {
            throw new \Exception("The action $realName does not exist!");
        }
    }

    /**
     * Render a php view file
     * @param type $viewFile
     * @param type $params
     */
    public function render($viewFile, $params = []) {

        include $viewFile . '.php';
    }

    /**
     * Redirect the browser to the specific router
     * @param type $route
     */
    public function redirect($route) {

        header("Location: index.php?r=$route");
        die();
    }

}

?>
