<?php
session_start();

if (!isset($_SESSION['username'])) {

    header('Location: nologin/index.php');
    exit();
}

if (isset($_SESSION['profile'])) {
    $role = $_SESSION['profile'];

    if ($role === 'admin') {

        header('Location: admin/index.php');
        exit();
    } elseif ($role === 'member') {

        header('Location: member/index.php');
        exit();
    } else {

        header('Location: nologin/index.php');
        exit();
    }
} else {

    header('Location: nologin/index.php');
    exit();
}
