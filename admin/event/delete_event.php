<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classEvent.php');

if (isset($_GET['idevent'])) {
    $eventId = intval($_GET['idevent']);
    $event = new Event($eventId, "", "", "");
    $event->deleteEvent($koneksi);
    header("Location: event.php");
    exit;
}
