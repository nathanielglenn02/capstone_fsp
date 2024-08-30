<?php
$title = "Registrasi - Club Informatics 2024";
require_once('../template/header.php');
require_once('../service/config.php');
require_once('../class/classMember.php');
?>
<!-- Konten Utama -->
<div class="content">
    <h3>Registrasi</h3>
    <!-- Form Registrasi -->
    <form action="register-proses.php" method="POST">
        <label for="fname">First Name: </label><br>
        <input type="text" id="fname" name="fname"><br><br>
        <label for="lname">Last Name: </label><br>
        <input type="text" id="lname" name="lname"><br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Daftar" name = "simpan">
    </form>
</div>

<?php
require_once('../template/footer.php');

?>