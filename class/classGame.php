<?php
class Game
{
    private $gameId;
    private $gameName;
    private $description;

    public function __construct($gameId, $gameName, $description)
    {
        $this->gameId = $gameId;
        $this->gameName = $gameName;
        $this->description = $description;
    }

    // Getter dan Setter
    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    public function getGameName()
    {
        return $this->gameName;
    }

    public function setGameName($gameName)
    {
        $this->gameName = $gameName;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
}