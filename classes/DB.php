<?php
class DB {
  private $conn;

  public function __construct() {
    $host = "127.0.0.1";
    $port = "5432";
    $dbname = "pweb";
    $user = "postgres";
    $password = "123"; // ganti sesuai konfigurasi kamu

    $this->conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$this->conn) {
      die("❌ Koneksi ke database gagal.");
    }
  }

  public function getConnection() {
    return $this->conn;
  }
}
