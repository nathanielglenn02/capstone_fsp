<?php
require_once('../service/config.php');
require_once('../class/classGame.php');

$title = "Game - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil semua data game dari database
$games = Game::getAllGames($koneksi);
?>

<!-- Konten Utama -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Game</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Game</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Detail Game</h3>
                <a href="create_game.php"><i class='bx bx-plus'></i></a>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Game</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan data game yang diambil dari database
                    foreach ($games as $game) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($game->getGameName()) . "</td>";
                        echo "<td><p>" . htmlspecialchars($game->getDescription()) . "</p></td>";
                        echo "<td>";
                        echo "<a href='edit_game.php?id=" . $game->getGameId() . "'><i class='fa-solid fa-pen'></i></a>";
                        echo "<a href='delete_game.php?id=" . $game->getGameId() . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus game ini?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>