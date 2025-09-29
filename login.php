<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: logiin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Kopi Kenongo</title>
  <link rel="stylesheet" href="styling.css">
</head>
<body>
  <header>
    <h1>Login ke Website Kopi Kenongo</h1>
  </header>

  <section>
    <?php if (isset($_GET['error'])): ?>
      <p style="color:black; text-align:center; text-bold">
        Login gagal! Periksa kembali nama, password, dan nomor HP.
      </p>
    <?php endif; ?>

    <form method="POST" action="checklogin.php">
      <label for="nama">Nama:</label><br>
      <input type="text" name="nama" id="nama" required><br><br>

      <label for="password">Password:</label><br>
      <input type="password" name="password" id="password" required><br><br>

      <label for="nohp">Nomor HP:</label><br>
      <input type="text" name="nohp" id="nohp" required><br><br>

      <button type="submit">Login</button>
    </form>
  </section>
</body>
</html>
