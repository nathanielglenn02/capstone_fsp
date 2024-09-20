<?php
require_once('../../service/config.php');
require_once('../../class/classAchievement.php');

if (isset($_GET['id'])) {
    $achievementid = intval($_GET['id']);
    $achievement = new Achievement($koneksi, $achievementid, "", "", "", "");
    $achievement->deleteAchievement($koneksi);
    header("Location: achievement.php");
    exit;
}
