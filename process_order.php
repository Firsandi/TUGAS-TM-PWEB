<?php
$host = "127.0.0.1";
$port = "5432";
$dbname = "pweb";
$user = "postgres";
$password = "jungkook";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "❌ Koneksi ke database gagal.";
    exit;
}

session_start();

$users_id = $_SESSION['users_id'] ?? null;

if (!$users_id) {
    echo "❌ User belum login.";
    exit;
}

$nama_pemesan = $_POST['nama_pemesan'] ?? '';
$nohp_pemesan = $_POST['nohp_pemesan'] ?? '';
$menu = $_POST['menu'] ?? '';
$harga = $_POST['harga'] ?? 0;
$tanggal = $_POST['tanggal'] ?? '';
$waktu = $_POST['waktu'] ?? '';

$query = "INSERT INTO orders (users_id, menu, harga, tanggal, waktu, nama_pemesan, nohp_pemesan)
          VALUES ($1, $2, $3, $4, $5, $6, $7)";
$result = pg_query_params($conn, $query,
  array($users_id, $menu, $harga, $tanggal, $waktu, $nama_pemesan, $nohp_pemesan)
);

echo $result ? "OK" : "❌ Gagal menyimpan ke database.";
?>