<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Informatics - Registrasi</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">Club Informatics</div>
    </nav>

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

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Club Informatics 2024</p>
    </footer>
</body>

</html>