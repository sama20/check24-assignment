<?php

namespace app\components\base;


abstract class Application extends Base
{

    protected $_config;
    protected static $_app;

  
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
