<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "fullstack";

$koneksi = mysqli_connect($hostname, $username, $password, $database);

if ($koneksi->connect_error) {
    echo "koneksi database rusak";
    die("error!");
}
