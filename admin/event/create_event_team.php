<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classEvent.php');
require_once('../../class/classEventTeams.php');

$idteam = isset($_GET['idteam']) ? intval($_GET['idteam']) : 0;

$events = Event::getAllEvents($koneksi);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'];

    $isEventExists = EventTeams::isEventInTeam($koneksi, $eventId, $idteam);

    if ($isEventExists) {
        echo "<script>alert('Event already exists in the team!'); window.location.href = 'create_event_team.php?idteam=$idteam';</script>";
    } else {
        $eventTeam = new EventTeams($eventId, $idteam);
        $eventTeam->createEventTeam($koneksi);

        header('Location: ../team/detail_team.php?idteam=' . $idteam);
        exit();
    }
}

$title = "Add Event to Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Add Event to Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Add Event</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <form id="add_event_team" method="POST">
                <div class="form-group">
                    <label for="event_id">Select Event:</label>
                    <select id="event_id" name="event_id" required>
                        <?php foreach ($events as $event): ?>
                            <option value="<?php echo $event->getEventId(); ?>"><?php echo htmlspecialchars($event->getEventName()); ?> - <?php echo htmlspecialchars($event->getDate()); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn">Add Event to Team</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>