<?php

namespace app\components\base;

/*
 * Base class to be inherited
 * 
 * @author moha.asghari@gmail.com
 */

abstract class Component
{

    protected $_config;

    public function __construct($config)
    {
        
        $this->_config = $config;
    }

   
    abstract function bootstrap($params);

    abstract function end($params);
}
