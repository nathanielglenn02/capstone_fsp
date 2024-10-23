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
    public static function getGameDetailsWithEventsPaging($koneksi, $idgame, $limit, $offset)
    {
        $query = "
            SELECT t.idteam, t.name AS team_name, e.idevent, e.name AS event_name, e.date AS event_date, e.description 
            FROM game g
            INNER JOIN team t ON g.idgame = t.idgame
            INNER JOIN event_teams et ON t.idteam = et.idteam
            INNER JOIN event e ON e.idevent = et.idevent
            WHERE g.idgame = ?
            LIMIT ? OFFSET ?
        ";
        $stmt = mysqli_prepare($koneksi, $query);
        if (!$stmt) {
            die('Prepare Error: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, 'iii', $idgame, $limit, $offset);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $teams = [];
        $events = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $team = new Team($koneksi, $row['idteam'], $row['team_name'], $idgame);
            $event = new Event($koneksi, $row['event_name'], $row['description'], $row['event_date']);

            $teams[] = $team;
            $events[] = $event;
        }

        mysqli_stmt_close($stmt);

        return ['teams' => $teams, 'events' => $events];
    }

    public static function getTotalEventsForGame($koneksi, $idgame)
    {
        $query = "
            SELECT COUNT(*) AS total 
            FROM event_teams et
            INNER JOIN team t ON et.idteam = t.idteam
            INNER JOIN game g ON t.idgame = g.idgame
            WHERE g.idgame = ?
        ";
        $stmt = mysqli_prepare($koneksi, $query);
        if (!$stmt) {
            die('Prepare Error: ' . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt, 'i', $idgame);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $row['total'] ?? 0;
    }

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
