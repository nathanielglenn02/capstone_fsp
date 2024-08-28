<?php
$title = "Registrasi - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

?>
<!-- Konten Utama -->
<div class="content">
    <h3>Registrasi</h3>
    <!-- Form Registrasi -->
    <form action="registrasi_action.html" method="POST">
        <label for="fullname">Nama Lengkap:</label><br>
        <input type="text" id="fullname" name="fullname"><br><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Daftar">
    </form>
</div>

<?php
require_once('../template/footer.php');

?>