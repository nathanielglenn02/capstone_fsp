<?php
require_once('../service/config.php');
require_once('../class/classTeam.php');

$title = "Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil semua data tim dari database
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
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <a href="create_team.php"><i class='bx bx-plus'></i></a>
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
                    // Loop untuk menampilkan data tim yang diambil dari database
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($team->getGameId()) . "</td>";
                        echo "<td><a href='detail_team.php?idteam=" . $team->getTeamId() . "'>Detail</a></td>";
                        echo "<td>";
                        echo "<a href='edit_team.php?id=" . $team->getTeamId() . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "<a href='delete_team.php?id=" . $team->getTeamId() . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus tim ini?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</td>";
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
</main>