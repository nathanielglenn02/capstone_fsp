<?php
$title = "Login - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

?>
<!-- Konten Utama -->
<div class="content">
    <h3>Login</h3>
    <!-- Form Login -->
    <form action="login_action.html" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</div>


<?php
require_once('../template/footer.php');

?>