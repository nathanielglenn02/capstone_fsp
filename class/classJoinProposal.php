<?php
class JoinProposal
{
    /* =======================
       Data Members
    ======================== */
    private $id;
    private $idmember;
    private $idteam;
    private $description;
    private $status;


    /* =======================
        Constructors
    ======================== */
    public function __construct($id, $idmember, $idteam, $description, $status)
    {
        $this->id = $id;
        $this->idmember = $idmember;
        $this->idteam = $idteam;
        $this->description = $description;
        $this->status = $status;
    }
    /* =======================
       Properties
    ======================== */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdMember()
    {
        return $this->idmember;
    }

    public function setIdMember($idmember)
    {
        $this->idmember = $idmember;
    }

    public function getIdTeam()
    {
        return $this->idteam;
    }

    public function setIdTeam($idteam)
    {
        $this->idteam = $idteam;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


    /* =======================
       Methods
    ======================== */
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

    public static function createProposal($koneksi, $idmember, $idteam, $description)
    {
        $status = 'waiting'; // Status default
        $query = "INSERT INTO join_proposal (idmember, idteam, description, status) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("iiss", $idmember, $idteam, $description, $status);
        $stmt->execute();
    }
}
