<?php
session_start();
require_once 'classes/Order.php';

$users_id = $_SESSION['users_id'] ?? null;
if (!$users_id) {
  echo "❌ User belum login.";
  exit;
}

$order = new Order();
$result = $order->simpan($users_id, $_POST);

echo $result ? "OK" : "❌ Gagal menyimpan ke database.";
