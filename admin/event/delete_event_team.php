<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classEventTeams.php');

if (isset($_GET['idevent']) && isset($_GET['idteam'])) {
    $eventId = intval($_GET['idevent']);
    $teamId = intval($_GET['idteam']);

    $url_asal = isset($_SESSION['return_url']) ? $_SESSION['return_url'] : '../team/detail_team.php?idteam=' . $teamId;

    EventTeams::deleteEventFromTeam($koneksi, $eventId, $teamId);

    header("Location: " . $url_asal);
    exit;
} else {
    echo "Invalid event or team ID.";
    exit;
}
