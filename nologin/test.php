<?php
require_once "../service/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatics E-Sport</title>
    <link rel="stylesheet" href="test.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

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
                <li><a href="<?= $main_url ?>auth/login.php" class="btn-login">Login</a></li>
            </ul>
        </nav>
    </header>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#home">Home</a>
        <a href="#games">Games</a>
        <a href="#teams">Teams</a>
        <a href="#events">Events</a>
        <a href="#achievements">Achievements</a>
        <a href="<?= $main_url ?>auth/login.php">Login</a>
    </div>

    <!-- Tombol Hamburger -->
    <div class="menu-btn" onclick="openNav()">&#9776;</div>


    <!-- Hero Section dengan Background -->
    <section id="home" class="hero">
        <div class="hero-background">
            <img src="../asset/image/images.jpg" alt="Hero Background">
        </div>
        <div class="hero-content">
            <h1>Welcome to Informatics E-Sport</h1>
            <p>Discover teams, games, events, and achievements in the world of e-sports.</p>
            <a href="#games" class="btn-main">Explore Now</a>
        </div>
    </section>

    <!-- Games Section -->
    <section id="games" class="section">
        <h2>Games</h2>
        <div class="carousel">
            <button id="games-prev">&#60;</button>
            <div id="games-slider" class="carousel-slider">
                <div class="card">
                    <h3>Battle Royale Kings</h3>
                    <p>Fight against 100 players to be the last one standing in a shrinking arena.</p>
                </div>
                <div class="card">
                    <h3>Arena Champions</h3>
                    <p>Choose your hero and compete in 5v5 matches with tactical objectives.</p>
                </div>
            </div>
            <button id="games-next">&#62;</button>
        </div>
    </section>

    <!-- Teams Section -->
    <section id="teams" class="section">
        <h2>Teams Overview</h2>
        <div class="carousel">
            <button id="teams-prev">&#60;</button>
            <div id="teams-slider" class="carousel-slider">
                <div class="card">
                    <h3>Kings of Battle</h3>
                    <p>Game: Battle Royale Kings</p>
                </div>
                <div class="card">
                    <h3>Champions United</h3>
                    <p>Game: Arena Champions</p>
                </div>
            </div>
            <button id="teams-next">&#62;</button>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="section">
        <h2>Events</h2>
        <div class="carousel">
            <button id="events-prev">&#60;</button>
            <div id="events-slider" class="carousel-slider">
                <div class="card">
                    <h3>Battle Royale Showdown</h3>
                    <p>Date: 2024-01-15</p>
                    <p>Compete in the ultimate battle royale tournament.</p>
                </div>
                <div class="card">
                    <h3>Arena Champions Cup</h3>
                    <p>Date: 2024-02-10</p>
                    <p>5v5 tournament with the best teams from around the world.</p>
                </div>
            </div>
            <button id="events-next">&#62;</button>
        </div>
    </section>

    <!-- Achievements Section -->
    <section id="achievements" class="section">
        <h2>Achievements</h2>
        <div class="carousel">
            <button id="achievements-prev">&#60;</button>
            <div id="achievements-slider" class="carousel-slider">
                <div class="card">
                    <h3>Kings of Battle</h3>
                    <p>Achievement: Battle Royale Champion</p>
                    <p>Date: 2024-01-15</p>
                </div>
                <div class="card">
                    <h3>Champions United</h3>
                    <p>Achievement: Arena Heroes</p>
                    <p>Date: 2024-02-10</p>
                </div>
            </div>
            <button id="achievements-next">&#62;</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-social">
        </div>
        <p>&copy; 2024 Informatics E-Sport. All Rights Reserved.</p>
    </footer>

    <script src="test.js"></script>
</body>

</html>