<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$title = "Edit Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$return_url = isset($_SESSION['return_url']) ? $_SESSION['return_url'] : 'achievement.php';

$idteam = isset($_GET['idteam']) ? intval($_GET['idteam']) : null;
$idachievement = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idachievement == 0) {
    header('Location: achievement.php');
    exit();
}

$achievement = Achievement::getAchievementById($koneksi, $idachievement);
$teams = Team::getAllTeams($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $achievementName = $_POST['achievement_name'];
    $teamid = $_POST['team_id'];
    $date = $_POST['ach_date'];
    $description = $_POST['ach_desc'];
    $achievement = new Achievement($koneksi);
    $achievement->setIdAchievement($idachievement);
    $achievement->setName($achievementName);
    $achievement->setIdTeam($teamid);
    $achievement->setDate($date);
    $achievement->setDescription($description);
    $achievement->updateAchievement();

    header('Location: ' . $return_url);
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Edit Achievement</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="achievement.php">Achievement</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Edit Achievement</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <form id="edit_achievement" method="POST">
                <div class="form-group">
                    <label for="achievement_name">Achievement Name</label>
                    <input type="text" id="achievement_name" name="achievement_name"
                        value="<?php echo htmlspecialchars($achievement->getName()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="team_id">Team</label>
                    <select id="team_id" name="team_id" <?= $idteam ? 'disabled' : '' ?> required>
                        <?php foreach ($teams as $team): ?>
                            <option value="<?php echo $team->getTeamId(); ?>"
                                <?= $idteam == $team->getTeamId() ? 'selected' : '' ?>>
                                <?php echo $team->getTeamName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <?php if ($idteam): ?>
                        <input type="hidden" name="team_id" value="<?= $idteam ?>">
                    <?php endif; ?>

                </div>
                <div class="form-group">
                    <label for="ach_date">Date</label>
                    <input type="date" id="ach_date" name="ach_date"
                        value="<?php echo htmlspecialchars($achievement->getDate()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="ach_desc">Description</label>
                    <textarea id="ach_desc" name="ach_desc"
                        required><?php echo htmlspecialchars($achievement->getDescription()); ?></textarea>
                </div>
                <button type="submit" class="btn">Edit Achievement</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>