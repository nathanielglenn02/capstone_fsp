<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classGame.php');

if (isset($_GET['id'])) {
    $gameId = intval($_GET['id']);

    $game = new Game($gameId, "", "");
    $game->deleteGame($koneksi);
    header("Location: game.php");
    exit;
}
