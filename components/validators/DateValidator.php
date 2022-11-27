<?php

namespace app\components\validators;

use \app\components\base\Validator as BaseValidator;

/**
 * Class to validate date format
 * 
 * @author moha.asghari@gmail.com
 */
class DateValidator extends BaseValidator
{

    
    public static function isValid($value, $options)
    {
        // TODO: It should be complate just copy from required validator
        if (!isset($value) || trim($value) == '') {
            return false;
        }

        return true;
    }
}
