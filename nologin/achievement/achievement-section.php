<?php
require_once "../service/config.php";
require_once('../class/classAchievement.php');

$achievements = Achievement::getAllAchievements($koneksi);
?>

<section id="achievements" class="section">
    <h2>Achievements</h2>
    <div class="carousel">
        <button id="achievements-prev" class="carousel-button">&#60;</button>
        <div id="achievements-slider" class="carousel-slider">
            <?php
            $achievements = Achievement::getAllAchievements($koneksi);

            foreach ($achievements as $achievement) {
                echo '<div class="achievement-card card" id="game-' . $index . '">';
                echo '<h3>' . htmlspecialchars($achievement->getIdTeam()) . '</h3>';
                echo '<p>Achievement: ' . htmlspecialchars($achievement->getName()) . '</p>';
                echo '<p>Date: ' . htmlspecialchars($achievement->getDate()) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <button id="achievements-next" class="carousel-button">&#62;</button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const cards = document.querySelectorAll('#achievements-slider .achievement-card');
        const totalCards = cards.length;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
        }

        document.getElementById('achievements-next').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % totalCards;
            showCard(currentIndex);
        });

        document.getElementById('achievements-prev').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            showCard(currentIndex);
        });

        showCard(currentIndex);
    });
</script>