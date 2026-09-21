<?php

$host = getenv('MYSQLHOST') ?: 'localhost';
$port = getenv('MYSQLPORT') ?: '3306';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$db   = getenv('MYSQLDATABASE') ?: 'swarajatim';

$koneksi = mysqli_connect(
    $host,
    $user,
    $pass,
    $db,
    (int) $port
);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

?>