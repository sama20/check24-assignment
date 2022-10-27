<?php

namespace app\components\base;


abstract class Base
{

    public function loadAttributes($attributes = [])
    {

        if (isset($attributes) && is_array($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
        return $this;
    }
    
    static function debug($obj, $kill = true)
    {
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
        if ($kill) {
            exit;
        }
    }
}
