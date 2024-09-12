<?php 

require_once "../service/config.php";

if (isset($_POST['simpan'])) {
    //ambil value elemen yg diposting
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $profile = "member";
    $pass = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO member (fname, lname, username, password, profile) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $koneksi->error);
    }
    $stmt->bind_param("sssss", $fname, $lname, $username, $pass, $profile);

    if ($stmt->execute()) {
        echo "<script>
        alert('Registrasi berhasil, silahkan login.');
        window.location.href = 'registrasi.php';
        </script>";
    } else {
        echo "<script>
        alert('Registrasi gagal: " . $stmt->error . "');
        window.location.href = 'registrasi.php';
        </script>";
    }
}