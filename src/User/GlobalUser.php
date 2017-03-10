<?php

namespace HBGameBundle\User;

/**
 * Wrapper for HBGlobalUser class which is delivered by game engine
 */
class GlobalUser 
{
    /**
     * Initializes a wrapper
     * @throws \HBGameBundle\User\Exception\GlobalUserException
     */
    public function __construct()
    {
        /**
         * Class HBGlobalUser must be defined
         */
        if (!class_exists('\HBGlobalUser')){
            throw Exception\GlobalUserException::sourceClassNotFound('\HBGlobalUser');
        }
    }
    
    /**
     * Gets current global user's ID
     * @return int
     */
    public function getUserId() : int
    {
       return (int) \HBGlobalUser::$currentGlobalUserID;
    }
    
    /**
     * Gets current sw user's ID
     * @return int
     */
    public function getSWUserId() : int
    {
        return (int) \HBGlobalUser::$currentGlobalSWUserID;
    }
    
    /**
     * Gets user last login timestamp
     * @return int
     */
    public function getLastLoginTimestamp() : int
    {
        return (int) \HBGlobalUser::$currentGlobalUserLastLogin;
    }
    
    /**
     * Gets global user nickname
     * @return string
     */
    public function getNickname() : string
    {
        return (string) \HBGlobalUser::$currentGlobalUserNickname;
    }
    
    /**
     * Gets id of referee user
     * @return int
     */
    public function getRefereeId() : int
    {
        return (int) \HBGlobalUser::$currentRefUserID;
    }
    
    /**
     * Gets current session
     * @return \HBGlobalSessionItem OR null
     */
    public function getSession()
    {
        return \HBGlobalUser::$current_session;
    }
    
    public function signin(int $swUserId)
    {
        /**
         * 
         */
        $signinResult = \HBGlobalUser::Login($swUserId);
        
        if (!$signinResult){
            $signupResult = \HBGlobalUser::createAccount();
            
            if ($signupResult){
                $signinResult = \HBGlobalUser::Login($swUserId);
                
                return $signinResult;
            }
            else{
                return false;
            }
        }
        
        return true;
    }
    
    public function isOnline()
    {
        return \HBGlobalUser::isLogged();
    }
    
}


?>

