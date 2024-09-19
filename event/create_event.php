<?php
require_once('../service/config.php');
require_once('../class/classEvent.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $event = new Event(null, $eventName, $description, $date);
    $event->createEvent($koneksi);

    header("Location: event.php");
    exit;
}

$title = "Create Event - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Create Event</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="event.php">Event</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Create Event</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Form untuk menambah event baru -->
    <div class="table-data">
        <div class="order">
            <form id="create_event" action="create_event.php" method="POST">
                <div>
                    <label for="name">Event Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div>
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <button type="submit" class="btn">Create Event</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>