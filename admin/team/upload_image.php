<?php
session_start();

if (!isset($_SESSION['idmember']) || $_SESSION['profile'] !== 'admin') {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');

$title = "Upload Image - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar_team.php');
require_once('../template/navbar.php');

$idteam = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idteam == 0) {
    header('Location: team.php');
    exit();
}

$team = Team::getTeamById($koneksi, $idteam);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];

    $fileExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    if ($fileExtension === 'jpg') {
        $imageName = $idteam . '.jpg';
        $targetDir = '../../public/img/';
        $targetFile = $targetDir . $idteam . '.jpg';

        if (move_uploaded_file($image['tmp_name'], $targetFile)) {

            $stmt = $koneksi->prepare("UPDATE team SET imgPath = ? WHERE idteam = ?");
            $stmt->bind_param("si", $imageName, $idteam);

            if ($stmt->execute()) {
                header('Location: team.php');
                exit();
            } else {
                $errorMessage = "Gagal memperbarui database.";
            }
        } else {
            $errorMessage = "Terjadi kesalahan saat memindahkan file gambar.";
        }
    } else {
        $errorMessage = "File yang diupload harus berformat JPG.";
    }
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Upload Image</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Upload Image</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <?php if (isset($errorMessage)) { ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
            <?php } ?>

            <h2>Upload Image For Team : </h2>
            <h3><?php echo $team->getTeamName() ?></h3>
            <form method="POST" enctype="multipart/form-data" id="add_team_image">
                <label for="image">Pilih gambar JPG:</label>
                <input type="file" name="image" id="image" accept=".jpg" required> <br>

                <button type="submit" class="btn">Upload Image</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>