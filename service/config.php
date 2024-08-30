<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "capstone";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    echo "koneksi database rusak";
    die("error!");
}

function uploadimg($url)
{
    $namafile = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmp = $_FILES['image']['tmp_name'];

    //cek file yang dipload 
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $namafile);
    $fileExtension = strtolower(end($fileExtension));
    if (!in_array($fileExtension, $validExtension)) {
        header("location:" . $url . '?msg=notimage');
        die;
    }

    //cek ukuran gambar
    if ($ukuran > 1000000) {
        header("location:" . $url . '?msg=oversize');
        die;
    }

    //generate nama file gambar
    if ($url == 'index.php') {
        $namafilebaru = rand(0, 50) . '-Team' . '.' . $fileExtension;
    } else {
        $namafilebaru = rand(10, 1000) . '-User' . '.' . $namafile;
    }

    //upload gambar
    move_uploaded_file($tmp, "../asset/image/" . $namafilebaru);
    return $namafilebaru;
}
$main_url = "http://localhost/Capstone-FSP/";