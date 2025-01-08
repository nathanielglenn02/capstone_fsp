<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$title = "Create Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$games = Game::getAllGames($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['team_name'];
    $gameId = $_POST['game_id'];
    $imageName = 'default.jpg';

    $team = new Team($koneksi);
    $team->setTeamName($teamName);
    $team->setGameId($gameId);

    $team->createTeam();
    $teamId = $team->getTeamId();

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if ($fileExtension !== 'jpg') {
            $errorMessage = "File yang diupload harus berformat JPG.";
        } else {
            $imageName = $teamId . '.jpg';
            $imagePath = '../../public/img/' . $imageName;

            if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                $errorMessage = "Gagal meng-upload gambar.";
            }
        }
    }

    if (empty($errorMessage)) {
        $team->setImgPath($imageName);
        $team->updateTeam();

        header('Location: team.php');
        exit();
    }
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
    <div class="table-data">
        <div class="order">
            <?php if (!empty($errorMessage)) { ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
            <?php } ?>

            <form id="create_team" method="POST" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="image">Pilih gambar JPG:</label>
                    <input type="file" name="image" id="image" accept=".jpg"> <br>
                </div>

                <button type="submit" class="btn">Create Team</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>