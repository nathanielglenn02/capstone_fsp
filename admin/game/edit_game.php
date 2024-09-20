<?php
require_once('../../service/config.php');
require_once('../../class/classGame.php');

$gameId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($gameId == 0) {
    header('Location: game.php');
    exit();
}

$game = Game::getGameById($koneksi, $gameId);

if (!$game) {
    header('Location: game.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameName = $_POST['name'];
    $description = $_POST['description'];

    $game->setGameName($gameName);
    $game->setDescription($description);

    $game->updateGame($koneksi);

    header("Location: game.php");
    exit;
}

$title = "Edit Game - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<!-- Konten Form Edit -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Game</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="game.php">Game</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Edit Game</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <form id="edit_game" method="POST">
                <label for="name">Nama Game:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($game->getGameName()); ?>"
                    required>

                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description"
                    required><?php echo htmlspecialchars($game->getDescription()); ?></textarea>

                <button type="submit" class="btn">Edit Game</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>