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
    // Constructor
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
    // Getter dan Setter
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
    // Method untuk menambah achievement
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

    // Method untuk mendapatkan semua achievement berdasarkan idTeam
    public static function getAchievementsByTeam($conn, $idTeam)
    {
        $query = "SELECT * FROM achievement WHERE idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idTeam);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $achievements = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $achievement = new Achievement(
                $conn,
                $row['idachievement'],
                $row['idteam'],
                $row['name'],
                $row['date'],
                $row['description']
            );
            $achievements[] = $achievement;
        }

        mysqli_stmt_close($stmt);

        return $achievements;
    }

    // Method untuk update achievement
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

    // Method untuk delete achievement
    public function deleteAchievement()
    {
        $query = "DELETE FROM achievement WHERE idachievement = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $this->idAchievement);

        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }
}
