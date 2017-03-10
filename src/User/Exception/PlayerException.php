<?php

namespace HBGameBundle\User\Exception;

class PlayerException extends \Exception
{
    /**
     * Throws an exception when global variable 'PLAYER' is missed
     * @return \HBGameBundle\User\Exception\PlayerException
     */
    public static function globalVariableMissed() : PlayerException
    {
        return (new PlayerException(sprintf("Global variable 'PLAYER' not found!")));
    }
    
    /**
     * Throws an exception when global variable 'PLAYER' is empty (is null).
     * Maybe this global variable is not initialized yet by game's engine.
     * 
     * @return \HBGameBundle\User\Exception\PlayerException
     */
    public static function emptyGlobalVariable() : PlayerException
    {
        return (new PlayerException(sprintf("Global variable 'PLAYER' is empty (is null). Maybe, it is not initialized yet?")));
    }
    
    /**
     * Throws an exception when global variable 'PLAYER' is not instance of required class
     * @param string $instance Class's name
     * @return \HBGameBundle\User\Exception\PlayerException
     */
    public static function invalidInstanceGlobalVariable(string $instance) : PlayerException
    {
        return (new PlayerException(spritnf("Global variable 'PLAYER' is not instance of class '%s'", $instance)));
    }
    
}


?>
