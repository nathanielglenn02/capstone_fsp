<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');

if (isset($_GET['id'])) {
    $teamId = intval($_GET['id']);
    $team = new Team($koneksi, $teamId, "", "");
    $team->deleteTeam($koneksi);
    header("Location: team.php");
    exit;
}
