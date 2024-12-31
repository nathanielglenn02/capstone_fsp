<?php
require_once "../service/config.php";
require_once('../class/classAchievement.php'); // Kelas Achievement

// Mengambil semua data achievement tanpa paging
$achievements = Achievement::getAllAchievements($koneksi);
?>

<!-- Achievement Section -->
<section id="achievements" class="section">
    <h2>Achievements</h2>
    <div class="carousel">
        <button id="achievements-prev">&#60;</button>
        <div id="achievements-slider" class="carousel-slider">
            <?php
            // Mengambil data achievement dari database
            $achievements = Achievement::getAllAchievements($koneksi);

            foreach ($achievements as $achievement) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($achievement->getIdTeam()) . '</h3>'; // Nama tim
                echo '<p>Achievement: ' . htmlspecialchars($achievement->getName()) . '</p>'; // Nama pencapaian
                echo '<p>Date: ' . htmlspecialchars($achievement->getDate()) . '</p>'; // Tanggal pencapaian
                echo '</div>';
            }
            ?>
        </div>
        <button id="achievements-next">&#62;</button>
    </div>
</section>