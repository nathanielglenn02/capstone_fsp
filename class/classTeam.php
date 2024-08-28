<?php
class Team
{
    private $teamId;
    private $teamName;
    private $gameId; // Foreign key ke Game

    public function __construct($teamId, $teamName, $gameId)
    {
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->gameId = $gameId;
    }

    // Getter dan Setter
    public function getTeamId()
    {
        return $this->teamId;
    }

    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }
}