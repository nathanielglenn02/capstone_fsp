<?php
require_once('../service/config.php');
require_once('../class/classGame.php');

if (isset($_GET['id'])) {
    $gameId = intval($_GET['id']);

    // Inisialisasi objek Game dengan ID
    $game = new Game($gameId, "", "");

    // Panggil metode untuk menghapus game
    $game->deleteGame($koneksi);

    // Redirect kembali ke halaman game
    header("Location: game.php");
    exit;
}
