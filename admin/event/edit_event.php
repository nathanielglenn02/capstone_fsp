<?php
require_once('../../service/config.php');
require_once('../../class/classEvent.php');

$idevent = isset($_GET['idevent']) ? intval($_GET['idevent']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $event = new Event($idevent, $eventName, $description, $date);
    $event->updateEvent($koneksi);

    header("Location: event.php");
    exit;
} else {
    $event = Event::getEventById($koneksi, $idevent);
}

$title = "Edit Event - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Event</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="event.php">Event</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Edit Event</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Form untuk mengedit event -->
    <div class="table-data">
        <div class="order">
            <form id="edit_event" action="edit_event.php?idevent=<?php echo $idevent; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" id="name" name="name"
                        value="<?php echo htmlspecialchars($event->getEventName()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description"
                        value="<?php echo htmlspecialchars($event->getDescription()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($event->getDate()); ?>"
                        required>
                </div>
                <button type="submit" class="btn">Edit Event</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>