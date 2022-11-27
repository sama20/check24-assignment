<?php

namespace app\components\base;

/**
 * Example of Singleton
 * http://designpatternsphp.readthedocs.io/en/latest/Creational/Singleton/README.html#
 * 
 * @author moha.asghari@gmail.com
 */
abstract class Application extends Base
{

    protected $_config;
    protected static $_app;

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct($config = [])
    {

        $this->_config = $config;
        Application::$_app = $this;
    }
    
    static function app()
    {
        return self::$_app;
    }


    public function getConfig($name)
    {
        return $this->_config[$name];
    }

    public static function getInstance($config = [])
    {

        static $instance = null;
        // print_r(json_encode($config));die;
        if (null === $instance) {
            $instance = new static($config);
        }

        return $instance;
    }

    abstract public function run();
}
