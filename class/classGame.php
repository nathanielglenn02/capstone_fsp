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

    /* =======================
       Methods
    ======================== */
    // Metode untuk menambah game ke database
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


    // Metode untuk membaca semua game dari database
    public static function getAllGames($koneksi)
    {
        $query = "SELECT idgame, name, description FROM game";
        $result = mysqli_query($koneksi, $query);

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

    public static function getGameDetails($koneksi){
        $query = "SELECT t.idteam as team_id, t.name as team_name, t.idgame as id_game, e.name as event_name, e.date as event_date, e.description as description FROM game as g
                    inner join team as t on g.idgame = t.idgame 
                    inner join event_teams as et on t.idteam = et.idteam
                    inner join event as e on e.idevent = et.idevent";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        // Array untuk menampung hasil
        $teams = [];
        $events = [];

        // Loop untuk mengisi array dengan data dari query
        while ($row = mysqli_fetch_assoc($result)) {
            // Buat objek Team dan Event, kemudian masukkan ke array masing-masing
            $team = new Team($koneksi, $row['team_id'], $row['team_name'], $row['id_game'] );
            $teams[] = $team;
        
            $event = new Event($koneksi, $row['event_name'], $row['description'], $row['event_date']);
            $events[] = $event;

        }

    // Kembalikan hasil sebagai array dengan dua elemen: teams dan events
        return ['teams' => $teams, 'events' => $events];
    }

    // Metode untuk mengupdate game dari database
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

    // Metode untuk menghapus game dari database
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
