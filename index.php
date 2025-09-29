<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kopi Kenongo</title>
  <link rel="stylesheet" href="styling.css">
  <script src="dinamis.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
  <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

</head>
<body>

  <header>
    <h1>☕ Kopi Kenongo</h1>
    <p>Nikmati aroma dan cita rasa kopi terbaik dari Kenongo</p>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
    <a class="navbar-brand" href="#">☕ Kopi Kenongo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
        <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="#proses">Proses</a></li>
        <li class="nav-item"><a class="nav-link" href="#pemesanan">Pemesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
      </ul>
    </div>
  </div>
    </nav>
  </header>

  <section id="tentang">
    <h2>Tentang Kami</h2>
    <p>Kopi Kenongo hadir untuk memberikan pengalaman ngopi yang berbeda.
       Dengan biji kopi pilihan dan racikan khas, setiap tegukan akan membawa ketenangan.</p>
  </section>

  <section id="menu">
    <h2>Menu Kami</h2>
    <ul>
      <li>Espresso</li>
      <li>Cappuccino</li>
      <li>Latte</li>
      <li>Kopi Tubruk</li>
      <li>Kopi Susu Kenongo</li>
    </ul>
  </section>

  <section id="galeri">
    <h2>Galeri Kopi</h2>
    <img class = g1 src="https://images.tokopedia.net/img/KRMmCm/2022/8/26/ac829485-a518-4ff4-977c-9e0059555501.jpg" alt="Our Menu Outlet" class="gallery-img">
    <img class = g2 src="https://medha.id/wp-content/uploads/2022/01/Medha.id_.jpeg" alt="Our Menu RTD" class="gallery-img">
    <img class = g3 src="https://planmuvi.com/wp-content/uploads/2023/04/01-Kopi-Kenangan-Batavia-Planmuvi.jpg" alt="Our Outlet" class="gallery-img">
    <img class = g4 src="https://img2.beritasatu.com/cache/beritasatu/480x310-3/1598878755.png" alt="Our Academy" class="gallery-img">
  </section>

  <section id="proses">
    <h2>Proses Pemesanan</h2>
    <p>Berikut adalah cara pemesanan kopi kenongo melalui website:</p>
    <ol>
      <li>Masukkan data diri pada form pemesanan yang ada.</li>
      <li>Pilih kopi favorit kamu yang tersedia pada menu.</li>
      <li>Tanggal pesanan dan waktu akan otomatis terisi.</li>
      <li>Selesaikan pembayaran dengan scan qr yang tersedia setelah klik tombol pesan sekarang.</li>
      <li>Tukarkan kode pemesanan pada outlet terdekat dan nikmati kopi berkualitas dari kami.</li>
    </ol>
  </section>

  <section id="pemesanan">
    <h2>Form Pemesanan</h2>
    <form id= orderForm method="POST" action="process_order.php">
      <label for="nama">Nama:</label><br>
      <input type="text" name="nama" id="nama" required><br>
      <label for="nohp">No Hp:</label><br>
      <input type="text" id="nohp" name="nohp" required><br>

      <div id="react-root"></div>

      <label for="tanggal">Tanggal Pemesanan:</label><br>
      <input type="date" id="tanggal" name="tanggal" required><br>
      <label for="waktu">Waktu Pemesanan:</label><br>
      <input type="text" id="waktu" name="waktu" readonly><br><br>

      <button type="submit">Pesan Sekarang</button>
    </form>
  </section>

  <section id="kontak">
    <h2>Kontak</h2>
    <p>Email: <a href="mailto:kopikenongo@gmail.com">kopikenongo@gmail.com</a></p>
    <p>Instagram: <a href="https://www.instagram.com/kopi_kenongo" target="_blank">@kopi_kenongo</a></p>
  </section>

  <div class="kode" id="qrcode" style="display:none; text-align:center; margin-top:20px;">
  <h3>Silakan Scan QR untuk Pembayaran</h3>
  <div id="qrcode-box"></div>
  </div>

  <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="qrisModalLabel">Scan QRIS untuk Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div id="qrcode-modal"></div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <p>&copy; 2025 Kopi Kenongo</p>
  </footer>
  
  <script type="text/babel">
  const hargaMenu = {
    "Espresso": 20000,
    "Cappuccino": 25000,
    "Latte": 23000,
    "Kopi Tubruk": 18000,
    "Kopi Susu Kenongo": 27000
  };

  function MenuHarga() {
    const [menu, setMenu] = React.useState("Espresso");
    const [harga, setHarga] = React.useState(hargaMenu["Espresso"]);

    const handleChange = (e) => {
      const selected = e.target.value;
      setMenu(selected);
      setHarga(hargaMenu[selected]);
    };

    return (
      <div>
        <label htmlFor="menu">Pilih Menu Kopi:</label><br />
        <select id="menu" name="menu" value={menu} onChange={handleChange}>
          {Object.keys(hargaMenu).map((item) => (
            <option key={item} value={item}>{item}</option>
          ))}
        </select><br />
        <p>Harga: Rp {harga}</p>
      </div>
    );
  }

  ReactDOM.createRoot(document.getElementById("react-root")).render(<MenuHarga />);
</script>
</body>
</html>
