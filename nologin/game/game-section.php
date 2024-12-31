<?php
require_once "../service/config.php";
require_once('../class/classGame.php');
// Mengambil semua data game dari database
$games = Game::getAllGames($koneksi);
?>

<!-- Games Section -->
<section id="games" class="section">
    <h2>Games</h2>
    <div class="carousel">
        <button id="games-prev">&#60;</button>
        <div id="games-slider" class="carousel-slider">
            <?php
            // Looping data game dari database
            foreach ($games as $game) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($game->getGameName()) . '</h3>'; // Nama game
                echo '<p>' . htmlspecialchars($game->getDescription()) . '</p>'; // Deskripsi game
                echo '</div>';
            }
            ?>
        </div>
        <button id="games-next">&#62;</button>
    </div>
</section>