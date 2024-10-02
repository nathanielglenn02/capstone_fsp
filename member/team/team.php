<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');
require_once('../../class/classJoinProposal.php');

$title = "Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$teams = Team::getAllTeams($koneksi);
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Team</a>
                </li>
            </ul>
        </div>
        <div class="right">>
            <a href="join_status.php" class="btn btn-primary">Lihat Status Join</a>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Game</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($team->getGameId()) . "</td>";
                        echo "<td><a href='detail_team.php?idteam=" . $team->getTeamId() . "'>Detail</a></td>";
                        echo "<td>";

                        echo "<form method='POST' action='join_team.php' onsubmit='return confirmJoin()'>";
                        echo "<div class='form-group'>";
                        echo "<textarea name='description' placeholder='Tuliskan pesan Anda di sini...' rows='3'></textarea>";
                        echo "<button type='submit' class='btn btn-join'><i class='fas fa-user-plus'></i>Join</button>";
                        echo "</div>";
                        echo "<input type='hidden' name='idteam' value='" . $team->getTeamId() . "'>";
                        echo "</form>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>





            </table>
        </div>
    </div>

    <script>
        function confirmJoin() {
            return confirm("Apakah Anda yakin ingin bergabung dengan tim ini?");
        }
    </script>

    <?php
    require_once('../template/footer.php');
    ?>
</main>