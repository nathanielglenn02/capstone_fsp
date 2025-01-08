<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classGame.php');
require_once('../../class/classTeam.php');
require_once('../../class/classEvent.php');

$title = "Game Details - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$idgame = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$gameDetails = Game::getGameDetailsWithEventsPaging($koneksi, $idgame, $limit, $offset);
$totalEvents = Game::getTotalEventsForGame($koneksi, $idgame);
$totalPages = ceil($totalEvents / $limit);

$teams = $gameDetails['teams'];
$events = $gameDetails['events'];
?>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Game Details</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="game.php">Game</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Game Details</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Game Details</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($teams as $key => $team) {
                        $event = $events[$key] ?? null;

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getEventName()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getDate()) . "</td>";
                        echo "<td><p>" . htmlspecialchars($event->getDescription()) . "</p></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <div class="pagination" style="text-align: right;">
                <?php if ($totalEvents > 0): ?>
                    <?php if ($page > 1): ?>
                        <a href="?id=<?= $idgame ?>&page=<?= $page - 1 ?>">
                            << </a>
                            <?php else: ?>
                                <a href="#" class="disabled">
                                    << </a>
                                    <?php endif; ?>

                                    <?php
                                    $start_page = max(1, $page - 1);
                                    $end_page = min($totalPages, $start_page + 2);

                                    for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                        <?php if ($hal == $page): ?>
                                            <b><?= $hal ?></b>
                                        <?php else: ?>
                                            <a href="?id=<?= $idgame ?>&page=<?= $hal ?>"><?= $hal ?></a>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($page < $totalPages): ?>
                                        <a href="?id=<?= $idgame ?>&page=<?= $page + 1 ?>">>></a>
                                    <?php else: ?>
                                        <a href="#" class="disabled">>></a>
                                    <?php endif; ?>
                                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>