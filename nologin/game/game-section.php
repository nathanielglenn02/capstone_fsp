<?php
require_once "../service/config.php";
require_once('../class/classGame.php');

$games = Game::getAllGames($koneksi);
?>

<section id="games" class="section">
    <h2>Games</h2>
    <div class="carousel">
        <button id="games-prev" class="carousel-button">&#60;</button>
        <div id="games-slider" class="carousel-slider">
            <?php
            foreach ($games as $index => $game) {
                echo '<div class="game-card card" id="game-' . $index . '">';
                echo '<h3>' . htmlspecialchars($game->getGameName()) . '</h3>';
                echo '<p>' . htmlspecialchars($game->getDescription()) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <button id="games-next" class="carousel-button">&#62;</button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const cards = document.querySelectorAll('#games-slider .game-card');
        const totalCards = cards.length;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
        }

        document.getElementById('games-next').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % totalCards;
            showCard(currentIndex);
        });

        document.getElementById('games-prev').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            showCard(currentIndex);
        });

        showCard(currentIndex);
    });
</script>