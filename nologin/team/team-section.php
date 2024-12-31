<?php
require_once "../service/config.php";

require_once('../class/classTeam.php'); // File class Team

// Mengambil semua data team dari database
$teams = Team::getAllTeams($koneksi);
?>


<!-- Teams Section -->
<section id="teams" class="section">
    <h2>Teams Overview</h2>
    <div class="carousel">
        <button id="teams-prev">&#60;</button>
        <div id="teams-slider" class="carousel-slider">
            <?php
            // Looping data team dari database
            foreach ($teams as $team) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($team->getTeamName()) . '</h3>'; // Nama Tim
                echo '<p>Game: ' . htmlspecialchars($team->getGameId()) . '</p>'; // Nama Game terkait
                echo '</div>';
            }
            ?>
        </div>
        <button id="teams-next">&#62;</button>
    </div>
</section>