<?php
require_once "../service/config.php";
require_once('../class/classEvent.php');
$events = Event::getAllEvents($koneksi);
?>

<section id="events" class="section">
    <h2>Events</h2>
    <div class="carousel">
        <button id="events-prev" class="carousel-button">&#60;</button>
        <div id="events-slider" class="carousel-slider">
            <?php

            foreach ($events as $event) {
                echo '<div class="event-card card" id="game-' . $index . '">';
                echo '<h3>' . htmlspecialchars($event->getEventName()) . '</h3>';
                echo '<p>Date: ' . htmlspecialchars($event->getDate()) . '</p>';
                echo '<p>' . htmlspecialchars($event->getDescription()) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
        <button id="events-next" class="carousel-button">&#62;</button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const cards = document.querySelectorAll('#events-slider .event-card');
        const totalCards = cards.length;

        function showCard(index) {
            cards.forEach((card, i) => {
                card.classList.toggle('active', i === index);
            });
        }

        document.getElementById('events-next').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex + 1) % totalCards;
            showCard(currentIndex);
        });

        document.getElementById('events-prev').addEventListener('click', function(event) {
            event.preventDefault();
            currentIndex = (currentIndex - 1 + totalCards) % totalCards;
            showCard(currentIndex);
        });

        showCard(currentIndex);
    });
</script>