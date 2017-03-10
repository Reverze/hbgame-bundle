<?php

namespace HBGameBundle\User;

class Player
{
    /**
     * Player's object
     * @var \HBPlayer
     */
    protected $playerObject = null;
    
    
    public function __construct(bool $createFromGlobals = false, \HBPlayer $playerObject = null)
    {
        /**
         * Creates from global variable 'PLAYER'
         */
        if ($createFromGlobals === true){
            $this->createFromGlobals();
        }
        else if (!empty($playerObject)){
            $this->createFromObject($playerObject);
        }
    }
    
    /**
     * Creates from globals variable
     * @global \HBPlayer $PLAYER
     * @throws \HBGameBundle\User\Exception\PlayerException
     */
    private function createFromGlobals()
    {
        /**
         * Access to global varialbe
         */
        global $PLAYER;
        
        /**
         * If global variable is not set
         */
        if (!isset($PLAYER)){
            throw Exception\PlayerException::globalVariableMissed();
        }
        
        /**
         * If global variable is empty
         */
        if (empty($PLAYER)){
            throw Exception\PlayerException::emptyGlobalVariable();
        }
        
        /**
         * On invalid instance
         */
        if (!$PLAYER instanceof \HBPlayer){
            throw Exception\PlayerException::invalidInstanceGlobalVariable('\HBPlayer');
        }
        
        /**
         * Stores current player's object
         */
        $this->playerObject = $PLAYER;
    }
    
    /**
     * Creates from passed player's object
     * @param \HBPlayer $playerObject
     */
    private function createFromObject(\HBPlayer $playerObject)
    {
        $this->playerObject = $playerObject;
    }
    
    
    /**
     * Gets name
     * @return string
     */
    public function getName() : string
    {
        return (string) $this->playerObject->name;
    }
    
    /**
     * Gets id
     * @return int
     */
    public function getId() : int
    {
        return (int) $this->playerObject->id;
    }
    
    /**
     * Gets profile array
     * @return array
     */
    public function getProfile() : array
    {
        return (array) $this->playerObject->user_profile;
    }
    
    public function getSomething()
    {
        return null;
    }
    
    public function isUserExistsOnServer(int $swUserId, int $serverId) : bool
    {
        return (bool) \HBPlayer::UserExists($swUserId, $serverId);
    }
    
    public function getUserInfoOnServer(int $swUserId, int $serverId) : array
    {
        return \HBPlayer::getUserInfoOnServer($swUserId, $serverId);
    }
    
    
    
}


?>
