<?php

namespace HBGameBundle\User\Exception;

class GlobalUserException extends \Exception
{
    /**
     * Throws an exception when sources class was not found
     * @param string $className
     * @return \HBGameBundle\User\Exception\GlobalUserException
     */
    public static function sourceClassNotFound(string $className) : GlobalUserException
    {
        return (new GlobalUserException(sprintf("Source's class not found. (Class name: '%s')", $className)));
    }
    
}


?>
