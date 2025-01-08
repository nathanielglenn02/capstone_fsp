<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');

$return_url = isset($_SESSION['return_url']) ? $_SESSION['return_url'] : 'achievement.php';

if (isset($_GET['id'])) {
    $achievementid = intval($_GET['id']);
    $achievement = new Achievement($koneksi, $achievementid, "", "", "", "");
    $achievement->deleteAchievement($koneksi);

    header('Location: ' . $return_url);
    exit;
} else {
    echo "Achievement ID not found.";
    exit;
}
