<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nohp = htmlspecialchars($_POST['nohp']);
    $menu = htmlspecialchars($_POST['menu']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $waktu = htmlspecialchars($_POST['waktu']);
    $line = "Nama: $nama\n".
            "No HP: $nohp\n".
            "Menu: $menu\n".
            "Tanggal: $tanggal\n".
            "Waktu: $waktu\n";
    file_put_contents("orders.txt", $line, FILE_APPEND);

     echo "OK";
}
?>
