<?php
require_once('../service/config.php');
require_once('../class/classEvent.php');

$title = "Event - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil semua data event dari database
$events = Event::getAllEvents($koneksi);
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
                <i class='bx bx-search'></i>
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
                    // Loop untuk menampilkan data event yang diambil dari database
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
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>