<?php
require_once('../service/config.php');
require_once('../class/classAchievement.php');

if (isset($_GET['id'])) {
    $achievementid = intval($_GET['id']);

    // Inisialisasi objek Team dengan ID
    $achievement = new Achievement($koneksi, $achievementid, "", "", "", "");

    // Panggil metode untuk menghapus tim
    $achievement->deleteAchievement($koneksi);

    // Redirect kembali ke halaman team
    header("Location: achievement.php");
    exit;
}
