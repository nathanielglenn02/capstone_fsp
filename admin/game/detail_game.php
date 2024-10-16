<?php
session_start();

if (!isset($_SESSION['idmember'])) {
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
$gameDetails = Game::getGameDetails($koneksi, $idgame);

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
                <i class='bx bx-plus'></i>
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
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>