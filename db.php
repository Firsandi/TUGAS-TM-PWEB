<?php
$host = "127.0.0.1";
$username = "postgres"; // ganti dari 'root'
$password = "123";
$dbname = "pweb";
$port = "5432"; // ganti dari 3306



$conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");

if (!$conn) {
    die("Koneksi gagal");
} else {
    echo "Koneksi berhasil!";
}
?>
