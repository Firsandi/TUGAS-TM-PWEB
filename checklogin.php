<?php
session_start();

$host = "127.0.0.1";
$username = "postgres";
$password = "dinadin";
$dbname = "pweb";
$port = "5432";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");

if (!$conn) {
    die("Koneksi gagal");
}

$nama = $_POST['nama'];
$pass = $_POST['password'];
$nohp = $_POST['nohp'];

$query = "SELECT * FROM users WHERE nama=$1 AND password=$2 AND nohp=$3";
$result = pg_query_params($conn, $query, array($nama, $pass, $nohp));

if (pg_num_rows($result) > 0) {
    $_SESSION['login'] = $nama;
    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
?>
