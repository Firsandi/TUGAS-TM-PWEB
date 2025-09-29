<?php
$host = "127.0.0.1";
$port = "5432";
$dbname = "pweb";
$user = "postgres";
$password = "dinadin";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "❌ Koneksi ke database gagal.";
    exit;
}

$nama = $_POST['users'] ?? '';
$nohp = $_POST['nohp'] ?? '';
$menu = $_POST['menu'] ?? '';
$harga = $_POST['harga'] ?? 0;
$tanggal = $_POST['tanggal'] ?? '';
$waktu = $_POST['waktu'] ?? '';

$query = "INSERT INTO orders (nama, nohp, menu, harga, tanggal, waktu) VALUES ($1, $2, $3, $4, $5, $6)";
$result = pg_query_params($conn, $query, array($nama, $nohp, $menu, $harga, $tanggal, $waktu));

if ($result) {
    echo "OK";
} else {
    echo "❌ Gagal menyimpan ke database.";
}
?>
