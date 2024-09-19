<?php
require_once('../service/config.php');
require_once('../class/classGame.php');

$title = "Create Game - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameName = $_POST['name'];
    $description = $_POST['description'];

    // Membuat objek Game baru
    $game = new Game(null, $gameName, $description);

    // Menyimpan game baru ke dalam database menggunakan metode createGame
    $game->createGame($koneksi);

    // Redirect kembali ke halaman game.php setelah berhasil menambahkan data
    header("Location: game.php");
    exit;
}
?>

<!-- Konten Utama -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Create Game</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="game.php">Game</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Create Game</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <form id="create_game" method="post">
                <label for="name">Nama Game:</label>
                <input type="text" id="name" name="name" required>

                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" required></textarea>

                <button type="submit" class="btn">Create Game</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>