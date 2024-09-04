<?php
require_once('../service/config.php');
require_once('../class/classEvent.php');

if (isset($_GET['idevent'])) {
    $eventId = intval($_GET['idevent']);

    // Inisialisasi objek Event dengan ID
    $event = new Event($eventId, "", "", "");

    // Panggil metode untuk menghapus event
    $event->deleteEvent($koneksi);

    // Redirect kembali ke halaman event
    header("Location: event.php");
    exit;
}
