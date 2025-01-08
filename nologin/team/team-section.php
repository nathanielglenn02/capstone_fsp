<?php
require_once "../service/config.php";
require_once('../class/classTeam.php');

$teams = Team::getAllTeams($koneksi);
?>

<section id="teams" class="section">
    <h2>Teams</h2>
    <div class="carousel">
        <button id="teams-prev" class="carousel-button">&#60;</button>
        <div id="teams-slider" class="carousel-slider">
            <?php
            foreach ($teams as $index => $team) {
                echo '<div class="team-card card" id="team-' . $index . '">';
                echo '<h3>' . htmlspecialchars($team->getTeamName()) . '</h3>';
                echo '<p>Game: ' . htmlspecialchars($team->getGameId()) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <button id="teams-next" class="carousel-button">&#62;</button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const cards = document.querySelectorAll('#teams-slider .team-card');
        const totalCards = cards.length;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
        }

        document.getElementById('teams-next').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % totalCards;
            showCard(currentIndex);
        });

        document.getElementById('teams-prev').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            showCard(currentIndex);
        });

        showCard(currentIndex);
    });
</script>