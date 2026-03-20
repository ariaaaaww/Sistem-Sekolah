// 1. Fungsi untuk Membuka Modal Upload (Gambar 3)
function openModal() {
  const modal = document.getElementById("uploadModal");
  modal.style.display = "flex"; // Menggunakan flex agar konten di tengah
  document.body.style.overflow = "hidden"; // Mencegah scrolling di background
}

// 2. Fungsi untuk Menutup Modal
function closeModal() {
  const modal = document.getElementById("uploadModal");
  modal.style.display = "none";
  document.body.style.overflow = "auto"; // Mengaktifkan kembali scrolling
}

// 3. Menutup modal jika user klik di luar area box putih
window.onclick = function (event) {
  const modal = document.getElementById("uploadModal");
  if (event.target == modal) {
    closeModal();
  }
};

// 4. Handle Preview Nama File saat Drag & Drop (Opsional tapi berguna)
const dropZone = document.querySelector(".drop-zone");
if (dropZone) {
  dropZone.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZone.style.borderColor = "#7ba2cc";
    dropZone.style.backgroundColor = "#eef2f7";
  });

  dropZone.addEventListener("dragleave", () => {
    dropZone.style.borderColor = "#333";
    dropZone.style.backgroundColor = "#f9f5eb";
  });
}

document.getElementById("likeBtn")?.addEventListener("click", function () {
  this.style.backgroundColor = "#5a8bbd";
  this.innerText = "Liked!";
});

// Modal logic tetap sama seperti sebelumnya
