<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');

$title = "Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$achievements = Achievement::getAllAchievement($koneksi);
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
                    foreach ($achievements as $achievement) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($achievement->getIdTeam()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getName()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getDate()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getDescription()) . "</td>";
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