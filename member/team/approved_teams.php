<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$idmember = $_SESSION['idmember'];
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$total_approved_teams = JoinProposal::getTotalApprovedTeamsByMember($koneksi, $idmember);
$approvedTeams = JoinProposal::getApprovedTeamsByMemberWithPaging($koneksi, $idmember, $limit, $offset);

$title = "My Approved Teams - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>My Approved Teams</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">My Approved Teams</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Approved Team List</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Game</th>
                        <th>Image</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($approvedTeams)) {
                        foreach ($approvedTeams as $team) {
                            $teamObj = Team::getTeamById($koneksi, $team['idteam']);
                            $gameObj = Game::getGameById($koneksi, $teamObj->getGameId());
                            $imgPath = htmlspecialchars($teamObj->getImgPath());

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($teamObj->getTeamName()) . "</td>";
                            echo "<td>" . htmlspecialchars($gameObj->getGameName()) . "</td>";
                            echo "<td><img src='../../public/img/$imgPath' alt='Team Image' width='50' height='50'></td>";
                            echo "<td><a href='detail_team.php?idteam=" . $team['idteam'] . "'>Detail</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>You are not part of any approved teams.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="pagination" style="text-align: right;">
                <?php if ($total_approved_teams > 0): ?>
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>">
                            << </a>
                            <?php else: ?>
                                <a href="#" class="disabled">
                                    << </a>
                                    <?php endif; ?>

                                    <?php
                                    $max_page = ceil($total_approved_teams / $limit);
                                    $start_page = max(1, $page - 1);
                                    $end_page = min($max_page, $start_page + 2);

                                    for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                        <?php if ($hal == $page): ?>
                                            <b><?= $hal ?></b>
                                        <?php else: ?>
                                            <a href="?page=<?= $hal ?>"><?= $hal ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($page < $max_page): ?>
                                        <a href="?page=<?= $page + 1 ?>">>></a>
                                    <?php else: ?>
                                        <a href="#" class="disabled">>></a>
                                    <?php endif; ?>
                                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>