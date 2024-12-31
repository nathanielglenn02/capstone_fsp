<?php
require_once "../service/config.php";
require_once('../class/classEvent.php');
$events = Event::getAllEvents($koneksi);
?>

<!-- Events Section -->
<section id="events" class="section">
    <h2>Events</h2>
    <div class="carousel">
        <button id="events-prev">&#60;</button>
        <div id="events-slider" class="carousel-slider">
            <?php
            // Looping data event dari database
            foreach ($events as $event) {
                echo '<div class="card">';
                echo '<h3>' . htmlspecialchars($event->getEventName()) . '</h3>'; // Nama Event
                echo '<p>Date: ' . htmlspecialchars($event->getDate()) . '</p>'; // Tanggal Event
                echo '<p>' . htmlspecialchars($event->getDescription()) . '</p>'; // Deskripsi Event
                echo '</div>';
            }
            ?>
        </div>
        <button id="events-next">&#62;</button>
    </div>
</section>