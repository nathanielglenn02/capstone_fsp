<?php
require_once('../service/config.php');
require_once('../class/classAchievement.php');

$title = "Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil semua data achievement dari database dengan nama tim terkait
$query = "SELECT achievement.idachievement, achievement.name AS achievement_name, achievement.date, achievement.description, team.name AS team_name 
          FROM achievement 
          JOIN team ON achievement.idteam = team.idteam";
$result = mysqli_query($koneksi, $query);
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Achievement</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Achievement</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Achievement List</h3>
                <a href="create_achievement.php"><i class='bx bx-plus'></i></a>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Achievement Name</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan data achievement yang diambil dari database
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['achievement_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
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