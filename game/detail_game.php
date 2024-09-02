<?php
require_once('../service/config.php');
require_once('../class/classGame.php');
require_once('../class/classTeam.php');
require_once('../class/classEvent.php');
$title = "Game Details - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil data detail game dari database
$gameDetails = Game::getGameDetails($koneksi);

// Ambil data tim dan event
$teams = $gameDetails['teams'];
$events = $gameDetails['events'];
?>

<!-- Konten Utama -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Game Details</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="game.php">Game</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Game Details</a>
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
                    // Loop untuk menampilkan data detail game
                    foreach ($teams as $key => $team) {
                        // Mengambil event yang sesuai dengan tim saat ini
                        $event = $events[$key] ?? null;

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getEventName()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getDate()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getDescription()) . "</td>";
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