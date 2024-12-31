<?php
require_once "../service/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatics E-Sport</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="<?= $main_url ?>asset/image/toga.png" type="image/x-icon">

</head>

<body>
    <!-- Header -->
    <header class="navbar">
        <a href="">
            <i class='bx bxs-smile'></i>
            <span class="logo">Informatics E-Sport</span>
        </a>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#games">Games</a></li>
                <li><a href="#teams">Teams</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#achievements">Achievements</a></li>
                <li><a href="<?= $main_url ?>auth/login.php" class="btn-login" style="color:#00d4ff">Login</a></li>
            </ul>
        </nav>
    </header>