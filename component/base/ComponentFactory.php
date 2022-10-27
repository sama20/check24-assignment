<?php

namespace app\components\base;


class ComponentFactory
{
    public static function create($name, $config)
    {
        $className = $config['class'];
        if (!isset($className)) {
            throw new \Exception("The classcomponet {$name} does not exist");
        }
        return new $className($config);
    }
}
