<?php
class Team
{
    private $teamId;
    private $teamName;
    private $gameId; // Foreign key ke Game
    private $conn;

    public function __construct($conn, $teamId = null, $teamName = null, $gameId = null)
    {
        $this->conn = $conn;
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

    public static function getAllTeams($koneksi)
    {
        $query = "SELECT t.idteam, g.name as game_name, t.name as team_name FROM team as t
                    inner join game as g on t.idgame = g.idgame";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $teams = [];

        while ($row = mysqli_fetch_assoc($result)) {
            var_dump($row);
            $team = new Team($row['idteam'], $row['team_name'], $row['game_name']);
            $teams[] = $team;
        }

        return $teams;
    }
}