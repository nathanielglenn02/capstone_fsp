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



$joinProposals = JoinProposal::getProposalById($koneksi, $idProposal);
$memberName = Member::getMemberNameById($koneksi, $joinProposals->getIdMember());
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
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
    <!-- Konten Utama -->
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
                        <option value="Pending" <?= $joinProposals->getStatus() == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Terima" <?= $joinProposals->getStatus() == 'Terima' ? 'selected' : '' ?>>Terima</option>
                        <option value="Tolak" <?= $joinProposals->getStatus() == 'Tolak' ? 'selected' : '' ?>>Tolak</option>
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