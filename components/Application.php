<?php

namespace app\components;

use app\components\Application as ComponentsApplication;
use app\components\base\{Application as BaseApplication,ComponentFactory,Component,ControllerFactory};


/**
 * Here is the backbone of application. On this class every request and response comes.
 * The parent class BaseApplication is a singleton to control the instances in memory.
 * 
 */
class Application extends BaseApplication
{

    public $name = '';
    public $router;
    public $controller;
    /**
     * Start the application
     */
    public function run()
    {

        $this->preInit();

        $this->init();

        $this->bootstrap();

        // $this->end();
    }

    /**
     * Load config from the config file /config/main.php
     */
    private function preInit()
    {
        // load configs
        $this->name = $this->_config['name'];
    }

    /**
     * Inicialize the components and resolve the routes
     */
    private function init()
    {

        // Inicialize all components
        if (is_array($this->_config['components'])) {
            
            foreach ($this->_config['components'] as $name => $component) {
                
                $component = ComponentFactory::create($name, $component);
                // $this->setComponent($name, $component)->bootstrap();
                // self::debug($name,0);
                $this->$name = $component;
                $component->bootstrap();
            }
        }

        // handle requests and got to route
        $this->resolveRoutes();
    }

    /**
     * Launch the action of controller
     */
    private function bootstrap()
    {
        // die(print_r(($this)));
        $this->controller->callAction($this->router->getActionName());
    }

    /**
     * Finish the application correctly for every component
     */
    // public function end()
    // {

    //     // Inicialize all components
    //     if (is_array($this->_config['components'])) {

    //         foreach ($this->_config['components'] as $name => $component) {
    //             die($this->$name);
    //             $this->$name->close();
    //         }
    //     }
    // }
    /**
     * Add the component on application instance.
     * @param string $name
     * @param Component $component
     * @return type
     */
    // private function setComponent(string $name, Component $component)
    // {
    //     $this->$name = $component;
    //     return $this->$name;
    // }
    /**
     * Create the router object and add that to the application instance
     * and delegate it to resolve the route of application.
     */
    private function resolveRoutes()
    {

        $router = new Router($this);
        $this->router = $router;
        //create the controller and run action
        $controller = ControllerFactory::create($router->getControllerName());
        $this->controller = $controller;
    }
}
