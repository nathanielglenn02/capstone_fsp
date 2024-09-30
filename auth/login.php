<?php
$title = "Login - Club Informatics 2024";
require_once('template/header.php');
require_once('../service/config.php');
require_once('../class/classMember.php');
?>
<!-- Konten Utama -->
<div class="content">
    <h3>Login</h3>
    <!-- Form Login -->
    <form action="login-proses.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login" name="login">
    </form>
    <a href="<?= $main_url ?>auth/registrasi.php">Registrasi</a>
</div>


<?php
require_once('template/footer.php');

?>