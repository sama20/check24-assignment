<?php

namespace app\components;

use app\components\base\Component;

class MySqlConnection extends Component
{

    // TODO: if I have time I will create an interface for it. for example iConnection

    public $conn;

    public function __construct($config)
    {
        
        parent::__construct($config);
    }

    public function bootstrap($params = [])
    {
        // Application::app()->debug($this->_config);
        return $this->connect($this->_config);
    }

    public function end($params = [])
    {
        $this->conn = null;
    }

    public function connect($config)
    {     
        try {
            $conn = new \PDO($config['dsn'], $config['username'], $config['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $this->conn = $conn;

        return;
    }

    
}
