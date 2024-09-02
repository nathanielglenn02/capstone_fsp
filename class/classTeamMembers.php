<?php
class TeamMembers
{
    private $idTeam;
    private $idMember;
    private $memberName;
    private $description;
    private $conn;

    public function __construct($conn, $idTeam = null, $idMember = null, $memberName = null, $description = null)
    {
        $this->conn = $conn;
        $this->idTeam = $idTeam;
        $this->idMember = $idMember;
        $this->memberName = $memberName;
        $this->description = $description;
    }

    public static function getMembersByTeam($conn, $idTeam)
    {
        $query = "SELECT m.idmember, m.fname, m.lname FROM team_members tm
                  JOIN member m ON tm.idmember = m.idmember
                  WHERE tm.idteam = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            die('Prepare failed: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $idTeam);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $members = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $member = new TeamMembers(
                $conn,
                $idTeam,
                $row['idmember'],
                $row['fname'] . ' ' . $row['lname'],
                null
            );
            $members[] = $member;
        }

        mysqli_stmt_close($stmt);

        return $members;
    }

    public function getMemberName()
    {
        return $this->memberName;
    }
}
