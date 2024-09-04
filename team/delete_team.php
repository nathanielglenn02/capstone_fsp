<?php
require_once('../service/config.php');
require_once('../class/classTeam.php');

if (isset($_GET['id'])) {
    $teamId = intval($_GET['id']);

    // Inisialisasi objek Team dengan ID
    $team = new Team($koneksi, $teamId, "", "");

    // Panggil metode untuk menghapus tim
    $team->deleteTeam($koneksi);

    // Redirect kembali ke halaman team
    header("Location: team.php");
    exit;
}
