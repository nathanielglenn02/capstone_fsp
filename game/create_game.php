<?php
require_once('../service/config.php');
require_once('../class/classGame.php');

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
            <h1>Tambah Game Baru</h1>
        </div>
    </div>
    <form method="post">
        <label for="name">Nama Game:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" value="Simpan">
    </form>
</main>

<?php
require_once('../template/footer.php');
?>