<?php
class Achievement
{
    /* =======================
       Data Members
    ======================== */
    private $idAchievement;
    private $idTeam;
    private $name;
    private $date;
    private $description;
    private $conn;

    /* =======================
        Constructors
    ======================== */
    public function __construct($conn, $idAchievement = null, $idTeam = null, $name = null, $date = null, $description = null)
    {
        $this->conn = $conn;
        $this->idAchievement = $idAchievement;
        $this->idTeam = $idTeam;
        $this->name = $name;
        $this->date = $date;
        $this->description = $description;
    }

    /* =======================
       Properties
    ======================== */
    public function getIdAchievement()
    {
        return $this->idAchievement;
    }

    public function setIdAchievement($idAchievement)
    {
        $this->idAchievement = $idAchievement;
    }

    public function getIdTeam()
    {
        return $this->idTeam;
    }

    public function setIdTeam($idTeam)
    {
        $this->idTeam = $idTeam;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
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
    public function createAchievement()
    {
        $query = "INSERT INTO achievement (idteam, name, date, description) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "isss", $this->idTeam, $this->name, $this->date, $this->description);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public static function getAllAchievements($koneksi)
    {
        $query = "
            SELECT a.idachievement, t.name as team_name, a.name, a.date, a.description 
            FROM achievement as a
            INNER JOIN team as t ON a.idteam = t.idteam
            ORDER BY a.date DESC
        ";

        $result = $koneksi->query($query);

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $achievements = [];

        while ($row = mysqli_fetch_assoc($result)) {

            $achievement = new Achievement(
                $koneksi,
                $row['idachievement'],
                $row['team_name'],
                $row['name'],
                $row['date'],
                $row['description']
            );
            $achievements[] = $achievement;
        }

        return $achievements;
    }


    public static function getAllAchievementWithPaging($koneksi,  $page = 1, $limit = 5, $search = "")
    {
        $offset = ($page - 1) * $limit;
        $search = "%" . $search . "%";
        $stmt = $koneksi->prepare("
            SELECT a.idachievement, t.name as team_name, a.name, a.date, a.description FROM achievement as a
            inner join team as t on a.idteam = t.idteam
            WHERE a.name LIKE ?
            LIMIT ?, ?
        ");
        $stmt->bind_param("sii", $search, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query Error: " . mysqli_error($koneksi));
        }

        $achievements = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $achievement = new Achievement($koneksi, $row['idachievement'], $row['team_name'], $row['name'], $row['date'], $row['description']);
            $achievements[] = $achievement;
        }

        return $achievements;
    }

    public static function getAchievementById($conn, $idachievement)
    {
        $query = "SELECT * FROM achievement WHERE idachievement = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idachievement);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        if ($row) {
            return new Achievement(
                $conn,
                $row['idachievement'],
                $row['idteam'],
                $row['name'],
                $row['date'],
                $row['description']
            );
        }

        return null;
    }

    public static function getPaginatedAchievementsByTeam($conn, $idteam, $page = 1, $limit = 5)
    {
        $offset = ($page - 1) * $limit;

        $query = "SELECT * FROM achievement WHERE idteam = ? LIMIT ?, ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "iii", $idteam, $offset, $limit);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $achievements = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $achievements[] = new Achievement(
                $conn,
                $row['idachievement'],
                $row['idteam'],
                $row['name'],
                $row['date'],
                $row['description']
            );
        }

        mysqli_stmt_close($stmt);

        return $achievements;
    }

    public static function getTotalAchievementsByTeam($conn, $idteam)
    {
        $query = "SELECT COUNT(*) AS total FROM achievement WHERE idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idteam);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        return $row['total'];
    }

    public static function getAchievementsByTeam($conn, $idteam)
    {
        $query = "SELECT * FROM achievement WHERE idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idteam);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $achievements = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $achievements[] = new Achievement(
                $conn,
                $row['idachievement'],
                $row['idteam'],
                $row['name'],
                $row['date'],
                $row['description']
            );
        }

        mysqli_stmt_close($stmt);

        return $achievements;
    }

    public function updateAchievement()
    {
        $query = "UPDATE achievement SET idteam = ?, name = ?, date = ?, description = ? WHERE idachievement = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "isssi", $this->idTeam, $this->name, $this->date, $this->description, $this->idAchievement);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    public function deleteAchievement($conn): void
    {
        $query = "DELETE FROM achievement WHERE idachievement = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $this->idAchievement);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
