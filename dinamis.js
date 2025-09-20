document.addEventListener("DOMContentLoaded", () => {
  // set tanggal otomatis
  const today = new Date().toISOString().split("T")[0];
  document.getElementById("tanggal").value = today;

  // update waktu tiap detik
  function updateTime() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, "0");
    const m = String(now.getMinutes()).padStart(2, "0");
    const s = String(now.getSeconds()).padStart(2, "0");
    document.getElementById("waktu").value = `${h}:${m}:${s}`;
  }
  setInterval(updateTime, 1000);
  updateTime();

  // handle form submit via AJAX
  const form = document.getElementById("orderForm");
  form.addEventListener("submit", (e) => {
    e.preventDefault(); // biar gak reload

    const formData = new FormData(form);

    fetch("process_order.php", {
      method: "POST",
      body: formData
    })
      .then(res => res.text())
      .then(data => {
        alert("✅ Pesanan berhasil disimpan!");
        form.reset(); // kosongkan input
        document.getElementById("tanggal").value = today; // isi ulang tanggal
        updateTime(); // isi ulang waktu
      })
      .catch(err => console.error("Error:", err));
  });
});
