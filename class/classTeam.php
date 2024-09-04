<?php
class Team
{
    /* =======================
       Data Members
    ======================== */
    private $teamId;
    private $teamName;
    private $gameId; // Foreign key ke Game
    private $conn;

    /* =======================
        Constructors
    ======================== */
    public function __construct($conn, $teamId = null, $teamName = null, $gameId = null)
    {
        $this->conn = $conn;
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->gameId = $gameId;
    }

    /* =======================
       Properties
    ======================== */
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

    /* =======================
       Methods
    ======================== */

    // Metode untuk membaca semua team dari database
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
            $team = new Team($koneksi, $row['idteam'], $row['team_name'], $row['game_name']);
            $teams[] = $team;
        }

        return $teams;
    }

    public function createTeam()
    {
        $query = "INSERT INTO team (name, idgame) VALUES (?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "si", $this->teamName, $this->gameId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public static function getTeamById($conn, $idteam)
    {
        $query = "SELECT * FROM team WHERE idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idteam);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return new Team($conn, $row['idteam'], $row['name'], $row['idgame']);
        } else {
            return null;
        }

        mysqli_stmt_close($stmt);
    }

    public function updateTeam()
    {
        $query = "UPDATE team SET name = ?, idgame = ? WHERE idteam = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "sii", $this->teamName, $this->gameId, $this->teamId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    // Metode untuk menghapus tim
    public function deleteTeam($conn)
    {
        $query = "DELETE FROM team WHERE idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $this->teamId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
