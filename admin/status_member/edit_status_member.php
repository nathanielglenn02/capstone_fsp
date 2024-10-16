<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classMember.php');

$title = "Edit Status - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$return_url = isset($_SESSION['return_url']) ? $_SESSION['return_url'] : 'achievement.php';
$idProposal = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idProposal == 0) {
    header('Location: status_member.php');
    exit();
}

$joinProposal = JoinProposal::getProposalById($koneksi, $idProposal);
$memberName = Member::getMemberNameById($koneksi, $joinProposal->getIdMember());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];

    if ($status !== 'rejected') {
        $approvedProposal = JoinProposal::getApprovedProposalByMember($koneksi, $joinProposal->getIdMember());

        if ($approvedProposal && $approvedProposal->getId() != $idProposal) {
            echo "<script>alert('Member ini sudah bergabung dengan tim lain. Tidak bisa mengubah status menjadi waiting atau approved.'); window.location.href = 'status_member.php';</script>";
            exit();
        }
    }

    $joinProposal->setStatus($status);
    $joinProposal->updateProposal($koneksi);

    if ($status === 'approved') {

        $query = "INSERT INTO team_members (idteam, idmember) VALUES (?, ?) ON DUPLICATE KEY UPDATE idteam = ?";
        $stmt = $koneksi->prepare($query);
        $idteam = $joinProposal->getTeamId();
        $idmember = $joinProposal->getIdMember();
        $stmt->bind_param("iii", $idteam, $idmember, $idteam);
        $stmt->execute();
        $stmt->close();

        $joinProposal->rejectOtherProposals($koneksi);
    } elseif ($status === 'rejected') {
        $query = "DELETE FROM team_members WHERE idteam = ? AND idmember = ?";
        $stmt = $koneksi->prepare($query);
        $idteam = $joinProposal->getTeamId();
        $idmember = $joinProposal->getIdMember();
        $stmt->bind_param("ii", $idteam, $idmember);
        $stmt->execute();
        $stmt->close();
    }

    header('Location: status_member.php');
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Status</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="status_member.php">Status Member</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Edit Status</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <form id="edit_status_member" method="POST">
                <div class="form-group">
                    <label for="member_name">Member Name</label>
                    <input type="text" id="member_name" name="member_name"
                        value="<?php echo htmlspecialchars($memberName); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="waiting" <?= $joinProposal->getStatus() == 'waiting' ? 'selected' : '' ?>>Waiting
                        </option>
                        <option value="approved" <?= $joinProposal->getStatus() == 'approved' ? 'selected' : '' ?>>
                            Approved</option>
                        <option value="rejected" <?= $joinProposal->getStatus() == 'rejected' ? 'selected' : '' ?>>
                            Rejected</option>
                    </select>
                </div>
                <button type="submit" class="btn">Update Status</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>