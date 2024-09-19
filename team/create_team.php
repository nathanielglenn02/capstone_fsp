<?php
require_once('../service/config.php');
require_once('../class/classTeam.php');
require_once('../class/classGame.php');

$title = "Create Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil semua data game untuk dropdown
$games = Game::getAllGames($koneksi);

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['team_name'];
    $gameId = $_POST['game_id'];

    $team = new Team($koneksi);
    $team->setTeamName($teamName);
    $team->setGameId($gameId);

    $team->createTeam();
    header('Location: team.php');
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Create Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Create Team</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <form id="create_team" method="POST">
                <div class="form-group">
                    <label for="team_name">Team Name</label>
                    <input type="text" id="team_name" name="team_name" required>
                </div>
                <div class="form-group">
                    <label for="game_id">Game</label>
                    <select id="game_id" name="game_id" required>
                        <?php foreach ($games as $game): ?>
                        <option value="<?php echo $game->getGameId(); ?>"><?php echo $game->getGameName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn">Create Team</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>