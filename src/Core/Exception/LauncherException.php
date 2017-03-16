<?php

namespace HBGameBundle\Core\Exception;


class LauncherException extends \Exception
{
    /**
     * Throws an exception when directory's path is invalid
     * @param string $directoryPath
     * @return \HBGameBundle\Core\Exception\LauncherException
     */
    public static function directoryNotFound(string $directoryPath) : LauncherException
    {
        return (new LauncherException(sprintf("Directory not found on path: '%s'", $directoryPath)));
    }
    
    /**
     * Throws an excpetion when file was not found on specified path 
     * @param string $filePath
     * @return \HBGameBundle\Core\Exception\LauncherException
     */
    public static function fileNotFound(string $filePath) : LauncherException
    {
        return (new LauncherException(sprintf("File not found on path '%s'", $filePath)));
    }
    
    /**
     * Throws an exception when error occured while importing script
     * @param string $scriptPath
     * @return \HBGameBundle\Core\Exception\LauncherException
     */
    public static function importScriptFailed(string $scriptPath) : LauncherException
    {
        return (new LauncherException(sprintf("Import php's script failed (file's path: '%s')", $scriptPath)));
    }
    
    /**
     * Throws an exception when class which is responsible for initialize engine was not found.
     * @param string $className
     * @return \HBGameBundle\Core\Exception\LauncherException
     */
    public static function engineInitControllerLost(string $className) : LauncherException
    {
        return (new LauncherException(sprintf("Class which is responsible for initialize engine wasnot found. Class name: '%s'", $className)));
    }
}


?>
