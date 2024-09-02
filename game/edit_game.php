<?php
require_once('../service/config.php');
require_once('../class/classGame.php');

if (isset($_GET['id'])) {
    $gameId = intval($_GET['id']);

    // Query untuk mendapatkan data game berdasarkan ID
    $query = "SELECT idgame, name, description FROM game WHERE idgame = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $gameId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $idgame, $name, $description);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gameName = $_POST['name'];
        $description = $_POST['description'];

        // Update game
        $game = new Game($gameId, $gameName, $description);
        $game->updateGame($koneksi);

        header("Location: game.php"); // Redirect ke halaman game.php
        exit;
    }
}
?>

<!-- Konten Form Edit -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Game</h1>
        </div>
    </div>
    <form method="post">
        <label for="name">Nama Game:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($description); ?></textarea>

        <input type="submit" value="Update">
    </form>
</main>

<?php
require_once('../template/footer.php');
?>