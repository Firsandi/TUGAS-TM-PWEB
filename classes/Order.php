<?php
require_once 'DB.php';

class Order {
  private $db;

  public function __construct() {
    $this->db = (new DB())->getConnection();
  }

  public function simpan($users_id, $data) {
    $query = "INSERT INTO orders (users_id, menu, harga, tanggal, waktu, nama_pemesan, nohp_pemesan)
              VALUES ($1, $2, $3, $4, $5, $6, $7)";
    $params = [
      $users_id,
      $data['menu'] ?? '',
      $data['harga'] ?? 0,
      $data['tanggal'] ?? '',
      $data['waktu'] ?? '',
      $data['nama_pemesan'] ?? '',
      $data['nohp_pemesan'] ?? ''
    ];

    return pg_query_params($this->db, $query, $params);
  }
}
