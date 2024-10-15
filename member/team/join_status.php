<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classTeam.php');

$idmember = $_SESSION['idmember'];

$joinProposals = JoinProposal::getProposalsByMember($koneksi, $idmember);

$title = "Status Join Proposal - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$joinProposals = JoinProposal::getProposalsByMemberWithPaging($koneksi, $idmember, $page, $limit);
$total_proposals = JoinProposal::getTotalProposalsByMember($koneksi, $idmember);
$total_pages = ceil($total_proposals / $limit);

?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Status Join Proposal</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Status Proposal</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Status Join Proposal</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Pesan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($joinProposals as $proposal) {
                        $team = Team::getTeamById($koneksi, $proposal->getTeamId());
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($proposal->getDescription()) . "</td>";
                        echo "<td>" . htmlspecialchars($proposal->getStatus()) . "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
            <div class="pagination" style="text-align: right;">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">
                        << </a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                << </a>
                                <?php endif; ?>

                                <?php
                                $start_page = max(1, $page - 1);
                                $end_page = min($total_pages, $start_page + 2);

                                for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                    <?php if ($hal == $page): ?>
                                        <b><?= $hal ?></b>
                                    <?php else: ?>
                                        <a href="?page=<?= $hal ?>"><?= $hal ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <a href="?page=<?= $page + 1 ?>">>></a>
                                <?php else: ?>
                                    <a href="#" class="disabled">>></a>
                                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>