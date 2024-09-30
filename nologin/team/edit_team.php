<?php
require_once('../../service/config.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$title = "Edit Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$idteam = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idteam == 0) {
    header('Location: team.php');
    exit();
}

$team = Team::getTeamById($koneksi, $idteam);
$games = Game::getAllGames($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['team_name'];
    $gameId = $_POST['game_id'];

    $team->setTeamName($teamName);
    $team->setGameId($gameId);

    $team->updateTeam();
    header('Location: team.php');
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Edit Team</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <form id="edit_team" method="POST">
                <label for="team_name">Team Name:</label>
                <input type="text" id="team_name" name="team_name"
                    value="<?php echo htmlspecialchars($team->getTeamName()); ?>" required>

                <label for="game_id">Game:</label>
                <select id="game_id" name="game_id" required>
                    <?php foreach ($games as $game): ?>
                        <option value="<?php echo $game->getGameId(); ?>"
                            <?php echo $game->getGameId() == $team->getGameId() ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($game->getGameName()); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="btn">Edit Team</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>