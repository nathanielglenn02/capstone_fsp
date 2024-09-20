<?php
require_once "../service/config.php";
$title = 'Dashboard';
require_once('template/header.php');
require_once('template/sidebar.php');
require_once('template/navbar.php');
require_once('../class/classTeam.php');

$teams = Team::getAllTeams($koneksi);
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>


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
                        <th>ID Team</th>
                        <th>Name</th>
                        <th>Game</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan data team yang diambil dari database
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamId()) . "</td>";
                        echo "<td><p>" . htmlspecialchars($team->getTeamName()) . "</p></td>";
                        echo "<td>" . htmlspecialchars($team->getGameId()) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require_once('template/footer.php');
    ?>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>