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
}
