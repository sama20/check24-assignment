<?php

namespace app\components\commons;

/**
 * Class with common and general methods to help the views, models and controllers.
 * 
 * @author moha.asghari@gmail.com
 */
class Helper
{
    
    static function inTheEnd($value, $caracter, $quantity)
    {
        if (strlen($value) >= $quantity) {
            return substr($value, 0, $quantity) . $caracter;
        }
        return $value;
    }
    /**
     * Format the date in a specific format
     * @param type string
     * @param type string
     * @return type string
     */
    static function dateFormat($value, $format)
    {
        $date = new \DateTime($value);
        return $date->format($format);
    }
    
    static function decodeHTML($value)
    {
        return html_entity_decode($value);
    }
    

}
