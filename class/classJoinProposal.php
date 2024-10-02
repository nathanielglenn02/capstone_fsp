<?php
class JoinProposal
{
    private $id;
    private $idmember;
    private $idteam;
    private $description;
    private $status;

    // Constructor
    public function __construct($id, $idmember, $idteam, $description, $status)
    {
        $this->id = $id;
        $this->idmember = $idmember;
        $this->idteam = $idteam;
        $this->description = $description;
        $this->status = $status;
    }

    // Fungsi untuk mengambil semua proposal berdasarkan id member
    public static function getProposalsByMember($koneksi, $idmember)
    {
        $query = "SELECT * FROM join_proposal WHERE idmember = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $idmember);
        $stmt->execute();
        $result = $stmt->get_result();

        $proposals = [];
        while ($row = $result->fetch_assoc()) {
            $proposals[] = new self(
                $row['idjoin_proposal'],
                $row['idmember'],
                $row['idteam'],
                $row['description'],
                $row['status']
            );
        }
        return $proposals;
    }

    // Fungsi untuk mendapatkan proposal berdasarkan id member dan id team
    public static function getProposalByMemberAndTeam($koneksi, $idmember, $idteam)
    {
        $query = "SELECT * FROM join_proposal WHERE idmember = ? AND idteam = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ii", $idmember, $idteam);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            return new self(
                $row['idjoin_proposal'],
                $row['idmember'],
                $row['idteam'],
                $row['description'],
                $row['status']
            );
        }
        return null;
    }

    // Fungsi untuk membuat proposal baru
    public static function createProposal($koneksi, $idmember, $idteam, $description)
    {
        $status = 'waiting'; // Status default
        $query = "INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("iiss", $idmember, $idteam, $description, $status);
        $stmt->execute();
    }

    // Getter methods
    public function getTeamId()
    {
        return $this->idteam;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
