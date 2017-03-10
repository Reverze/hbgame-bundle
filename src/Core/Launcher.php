<?php

namespace HBGameBundle\Core;

class Launcher
{
    /**
     * Path where hbgame engine's files are stored
     * @var string
     */
    private $binPath = null;
    
    /**
     * Name of init file
     * @var string
     */
    private $binFile = null;
    
    public function __construct(string $binPath, string $binFile)
    {
        if (empty($this->binFile)){
            $this->binFile = $binFile;
        }
        
        if (empty($this->binPath)){
            if (is_dir($binPath)){
                $this->binPath = $binPath;
            }
            else{
                throw Exception\LauncherException::directoryNotFound($binPath);
            }
        }
        
        /**
         * Imports game's engine
         */
        $this->importEngine();
    }
    
    /**
     * Imports game's engine
     * @throws \HBGameBundle\Core\Exception\LauncherException
     */
    protected function importEngine()
    {
        $compiledPath = realpath(sprintf("%s/%s", $this->binPath, $this->binFile));
        
        /**
         * If file is exists
         */
        if (is_file($compiledPath)){
            /**
             * If php's script import failed
             */
            if (!@require_once ($compiledPath)){
                throw Exception\LauncherException::importScriptFailed($compiledPath);
            }
        }
        /**
         * If file not found
         */
        else{
            throw Exception\LauncherException::fileNotFound($compiledPath);
        }
        
    }
    
    /**
     * Launchs game's engine
     * @throws \HBGameBundle\Core\Exception\LauncherException
     */
    public function launch()
    {
        /**
         * If master class is defined
         */
        if (class_exists('\HBGame')){ 
            \HBGame::Start();
        }
        /**
         * If class was not found, throws an exception
         */
        else{
            throw Exception\LauncherException::engineInitControllerLost('\HBGame');
        }
    }
}


?>