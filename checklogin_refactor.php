<?php
session_start();
require_once 'classes/Auth.php';

$auth = new Auth();
$user = $auth->login($_POST['nama'], $_POST['password'], $_POST['nohp']);

if ($user) {
  $_SESSION['login'] = true;
  $_SESSION['users_id'] = $user['users_id'];
  $_SESSION['nama'] = $user['nama'];
  $_SESSION['nohp'] = $user['nohp'];
  header("Location: index.php");
  exit;
} else {
  header("Location: login.php?error=1");
  exit;
}
