<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classEvent.php');

$title = "Event - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$_SESSION['return_url'] = $_SERVER['REQUEST_URI'];

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$search = isset($_GET['search']) ? $_GET['search'] : "";

$events = Event::getAllEventsWithPaging($koneksi, $page, $limit, $search);

$search_query = "%" . $search . "%";
$stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM event WHERE name LIKE ?");
$stmt->bind_param("s", $search_query);
$stmt->execute();
$total_events_result = $stmt->get_result();
$total_events = $total_events_result->fetch_assoc()['total'];
$total_pages = ceil($total_events / $limit);
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Event</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Event</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Event List</h3>
                <a href="create_event.php"><i class='bx bx-plus'></i></a>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search Event..."
                        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($events as $event) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($event->getEventName()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getDate()) . "</td>";
                        echo "<td>" . htmlspecialchars($event->getDescription()) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_event.php?idevent=" . $event->getEventId() . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "<a href='delete_event.php?idevent=" . $event->getEventId() . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus event ini?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination" style="text-align: right;">
                <?php
                if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">
                        << </a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                << </a>
                                <?php endif; ?>

                                <?php
                                $max_hal = ceil($total_events / $limit);

                                $start_page = max(1, $page - 1);
                                $end_page = min($max_hal, $start_page + 2);

                                for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                    <?php if ($hal == $page): ?>
                                        <b><?= $hal ?></b>
                                    <?php else: ?>
                                        <a href="?page=<?= $hal ?>&search=<?= urlencode($search) ?>"><?= $hal ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page < $max_hal): ?>
                                    <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">>></a>
                                <?php else: ?>
                                    <a href="#" class="disabled">>></a>
                                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>