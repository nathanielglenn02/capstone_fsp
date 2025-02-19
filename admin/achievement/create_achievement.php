<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$title = "Create Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar_achievement.php');
require_once('../template/navbar.php');

$idteam = isset($_GET['idteam']) ? intval($_GET['idteam']) : null;

$teams = team::getAllTeams($koneksi);

$return_url = isset($_SESSION['return_url']) ? $_SESSION['return_url'] : 'achievement.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $achievementName = $_POST['achievement_name'];
    $teamid = $_POST['team_id'];
    $date = $_POST['ach_date'];
    $description = $_POST['ach_desc'];

    $achievement = new Achievement($koneksi);
    $achievement->setName($achievementName);
    $achievement->setIdTeam($teamid);
    $achievement->setDate($date);
    $achievement->setDescription($description);
    $achievement->createAchievement();

    header('Location: ' . $return_url);
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Create Achievement</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="achievement.php">Achievement</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Create Achievement</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <form id="create_achievement" method="POST">
                <div class="form-group">
                    <label for="team_name">Achievement Name</label>
                    <input type="text" id="achievement_name" name="achievement_name" required>
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
                </div>

                <?php if ($idteam): ?>
                    <input type="hidden" name="team_id" value="<?php echo $idteam; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="ach_date">Date</label>
                    <input type="date" id="ach_date" name="ach_date" required>
                </div>
                <div class="form-group">
                    <label for="ach_desc">Description</label>
                    <textarea id="ach_desc" name="ach_desc" required></textarea>
                </div>
                <button type="submit" class="btn">Create Achievement</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>