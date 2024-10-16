<?php
class Game
{

    /* =======================
       Data Members
    ======================== */
    private $gameId;
    private $gameName;
    private $description;

    /* =======================
        Constructors
    ======================== */
    public function __construct($gameId, $gameName, $description)
    {
        $this->gameId = $gameId;
        $this->gameName = $gameName;
        $this->description = $description;
    }

    /* =======================
       Properties
    ======================== */
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

    /* =======================
       Methods
    ======================== */

    public function createGame($koneksi)
    {
        $query = "INSERT INTO game (name, description) VALUES (?, ?)";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "ss", $this->gameName, $this->description);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }


    public static function getAllGames($koneksi)
    {
        $stmt = $koneksi->prepare("
            SELECT idgame, name, description
            FROM game
        ");
        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $games = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $game = new Game($row['idgame'], $row['name'], $row['description']);
            $games[] = $game;
        }

        return $games;
    }
    public static function getAllGamesWithPaging($koneksi,  $page = 1, $limit = 5, $search = "")
    {
        $offset = ($page - 1) * $limit;
        $search = "%" . $search . "%";
        $stmt = $koneksi->prepare("
            SELECT idgame, name, description
            FROM game
            WHERE name LIKE ?
            LIMIT ?, ?
        ");
        $stmt->bind_param("sii", $search, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $games = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $game = new Game($row['idgame'], $row['name'], $row['description']);
            $games[] = $game;
        }

        return $games;
    }

    public static function getGameDetails($koneksi, $idgame)
    {
        $query = "SELECT t.idteam as team_id, t.name as team_name, t.idgame as id_game, e.name as event_name, e.date as event_date, e.description as description 
                  FROM game as g
                  INNER JOIN team as t ON g.idgame = t.idgame 
                  INNER JOIN event_teams as et ON t.idteam = et.idteam
                  INNER JOIN event as e ON e.idevent = et.idevent 
                  WHERE g.idgame = ?";

        $stmt = mysqli_prepare($koneksi, $query);
        if (!$stmt) {
            die("Prepare Error: " . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, 'i', $idgame);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $teams = [];
        $events = [];

        while ($row = mysqli_fetch_assoc($result)) {

            $team = new Team($koneksi, $row['team_id'], $row['team_name'], $row['id_game']);
            $teams[] = $team;

            $event = new Event($koneksi, $row['event_name'], $row['description'], $row['event_date']);
            $events[] = $event;
        }
        return ['teams' => $teams, 'events' => $events];
    }


    public function updateGame($koneksi)
    {
        $query = "UPDATE game SET name = ?, description = ? WHERE idgame = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "ssi", $this->gameName, $this->description, $this->gameId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public static function getGameById($conn, $gameId)
    {
        $query = "SELECT idgame, name, description FROM game WHERE idgame = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $gameId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            return new Game($row['idgame'], $row['name'], $row['description']);
        } else {
            return null;
        }

        mysqli_stmt_close($stmt);
    }


    public function deleteGame($koneksi)
    {
        $query = "DELETE FROM game WHERE idgame = ?";
        $stmt = mysqli_prepare($koneksi, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, "i", $this->gameId);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
