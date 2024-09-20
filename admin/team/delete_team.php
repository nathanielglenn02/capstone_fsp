<?php
require_once('../../service/config.php');
require_once('../../class/classTeam.php');

if (isset($_GET['id'])) {
    $teamId = intval($_GET['id']);
    $team = new Team($koneksi, $teamId, "", "");
    $team->deleteTeam($koneksi);
    header("Location: team.php");
    exit;
}
