document.addEventListener("DOMContentLoaded", () => {
  const today = new Date().toISOString().split("T")[0];
  document.getElementById("tanggal").value = today;

  function updateTime() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, "0");
    const m = String(now.getMinutes()).padStart(2, "0");
    const s = String(now.getSeconds()).padStart(2, "0");
    document.getElementById("waktu").value = `${h}:${m}:${s}`;
  }
  setInterval(updateTime, 1000);
  updateTime();

  const form = document.getElementById("orderForm");
  form.addEventListener("submit", (e) => {
    e.preventDefault(); // cegah reload

    const formData = new FormData(form);

    fetch("process_order.php", {
      method: "POST",
      body: formData
    })
      .then(res => res.text())
      .then(data => {
        if (data.trim() === "OK") {
          alert("✅ Pesanan berhasil disimpan!");

          form.reset();
          document.getElementById("tanggal").value = today;
          updateTime();

          const qrcodeModal = document.getElementById("qrcode-modal");
          qrcodeModal.innerHTML = ""; // clear biar nggak double
          new QRCode(qrcodeModal, {
            text: "https://link-pembayaran.com/checkout?id=12345", // ganti dengan ID unik dari backend
            width: 200,
            height: 200
          });

          const modal = new bootstrap.Modal(document.getElementById("qrisModal"));
          modal.show();
        } else {
          alert("❌ Terjadi kesalahan: " + data);
        }
      })
      .catch(err => {
        console.error("Error:", err);
        alert("⚠️ Gagal mengirim data. Silakan coba lagi.");
      });
  });
});
