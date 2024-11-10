<?php
class Team
{
    /* =======================
       Data Members
    ======================== */
    private $teamId;
    private $teamName;
    private $gameId; // Foreign key ke Game

    private $imgPath;
    private $conn;

    /* =======================
        Constructors
    ======================== */
    public function __construct($conn, $teamId = null, $teamName = null, $gameId = null, $imgPath = null)
    {
        $this->conn = $conn;
        $this->teamId = $teamId;
        $this->teamName = $teamName;
        $this->gameId = $gameId;
        $this->imgPath = $imgPath;
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

    public function getImgPath()
    {
        return $this->imgPath;
    }

    public function setImgPath($imgPath)
    {
        $this->imgPath = $imgPath;
    }

    /* =======================
       Methods
    ======================== */

    // Metode untuk membaca semua team dari database
    public static function getAllTeams($koneksi){
        $stmt = $koneksi->prepare("
            SELECT t.idteam, g.name as game_name, t.name as team_name, t.imgPath
            FROM team as t
            INNER JOIN game as g ON t.idgame = g.idgame
        ");
        $stmt->execute();
        
        $result = $stmt->get_result();

        $teams = [];
        while ($row = $result->fetch_assoc()) {
            $team = new Team($koneksi, $row['idteam'], $row['imgPath'], $row['team_name'], $row['game_name']);
            $teams[] = $team;
        }

    $stmt->close();
    return $teams;
    }
    public static function getAllTeamsWithPaging($koneksi, $page = 1, $limit = 5, $search = "")
    {
        $offset = ($page - 1) * $limit;
        $search = "%" . $search . "%"; 
        $stmt = $koneksi->prepare("
            SELECT t.idteam, g.name as game_name, t.name as team_name, t.imgPath
            FROM team as t
            INNER JOIN game as g ON t.idgame = g.idgame
            WHERE t.name LIKE ?
            LIMIT ?, ?
        ");
        $stmt->bind_param("sii", $search, $offset, $limit);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $teams = [];
        while ($row = $result->fetch_assoc()) {
            $team = new Team($koneksi, $row['idteam'],  $row['team_name'], $row['game_name'], $row['imgPath']);
            $teams[] = $team;
        }

        $stmt->close();
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

        $this->teamId = mysqli_insert_id($this->conn);

        mysqli_stmt_close($stmt);
    }

    public function updateTeam()
    {
        $query = "UPDATE team SET name = ?, idgame = ?, imgPath = ? WHERE idteam = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "sisi", $this->teamName,  $this->gameId, $this->imgPath,  $this->teamId);

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
