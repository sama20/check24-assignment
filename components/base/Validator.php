<?php

namespace app\components\base;

/**
 * Abstract Class to be inherited by all validators
 *  
 * @author moha.asghari@gmail.com
 */
abstract class Validator
{

    /**
     * Check if the $value is valid
     */
    abstract static function isValid($value, $options);
}
