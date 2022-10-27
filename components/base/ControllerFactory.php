<?php

namespace app\components\base;

class ControllerFactory
{

    public static function create($controllerName)
    {
        $className = "app\controllers\\" . ucfirst($controllerName) . 'Controller';
        
        if (!class_exists($className)) {
            throw new \Exception("$className not founded");
        }
        return new $className();
    }
}
