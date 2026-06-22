<?php
// koneksi.php

$host = "localhost";
$username = "root"; // Sesuaikan dengan username MySQL Anda
$password = "";     // Sesuaikan dengan password MySQL Anda
$database = "DB_UAS_PBO_AlyaDhitiNurIzdihar";

// Membuat koneksi menggunakan MySQLi
$koneksi = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi ke basis data gagal: " . $koneksi->connect_error);
}
?>