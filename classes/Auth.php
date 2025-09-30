<?php
require_once 'DB.php';

class Auth {
  private $db;

  public function __construct() {
    $this->db = (new DB())->getConnection();
  }

  public function login($nama, $password, $nohp) {
    $query = "SELECT * FROM users WHERE nama=$1 AND password=$2 AND nohp=$3";
    $result = pg_query_params($this->db, $query, array($nama, $password, $nohp));

    if (pg_num_rows($result) > 0) {
      return pg_fetch_assoc($result);
    }

    return false;
  }
}
