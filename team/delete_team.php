<?php
require_once('../service/config.php');
require_once('../class/classTeam.php');

// Mengambil idteam dari URL
$idteam = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idteam == 0) {
    // Jika idteam tidak valid, redirect ke halaman team
    header('Location: team.php');
    exit();
}

// Menghapus data tim berdasarkan idteam
Team::deleteTeamById($koneksi, $idteam);

// Setelah berhasil dihapus, redirect kembali ke halaman team
header('Location: team.php');
exit();
