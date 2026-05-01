// 1. Fungsi untuk Membuka Modal Upload
function openModal() {
  const modal = document.getElementById("uploadModal");
  if (modal) {
    modal.style.display = "flex"; // Menggunakan flex agar konten di tengah
    document.body.style.overflow = "hidden"; // Mencegah scrolling di background
  }
}

// 2. Fungsi untuk Menutup Modal
function closeModal() {
  const modal = document.getElementById("uploadModal");
  if (modal) {
    modal.style.display = "none";
    document.body.style.overflow = "auto"; // Mengaktifkan kembali scrolling
  }
}

// 3. Menutup modal jika user klik di luar area box modal (area gelap)
window.onclick = function (event) {
  const modal = document.getElementById("uploadModal");
  if (event.target == modal) {
    closeModal();
  }
};

// 4. Handle Preview Nama File (Input Biasa)
function displayFileName() {
  const input = document.getElementById("file-upload");
  const display = document.getElementById("file-name-display");
  if (input && input.files.length > 0) {
    display.innerText = "File terpilih: " + input.files[0].name;
  }
}

// 5. Handle Preview & Interaksi Drag & Drop
const dropZone = document.querySelector(".upload-top-section"); // Sesuaikan dengan class area drop kamu
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

  dropZone.addEventListener("drop", (e) => {
    e.preventDefault();
    dropZone.style.borderColor = "#333";
    dropZone.style.backgroundColor = "#f9f5eb";

    // Memasukkan file hasil drop ke input file
    const fileInput = document.getElementById("file-upload");
    if (e.dataTransfer.files.length > 0) {
      fileInput.files = e.dataTransfer.files;
      displayFileName(); // Update teks nama file
    }
  });
}

// 6. Logika Tombol Like pada Halaman Lampiran
document.addEventListener("DOMContentLoaded", function () {
  const likeBtn = document.getElementById("likeBtn");
  if (likeBtn) {
    likeBtn.addEventListener("click", function () {
      this.style.backgroundColor = "#5a8bbd";
      this.style.color = "white";
      this.innerText = "Liked!";
      // Opsional: tambahkan logika AJAX di sini jika ingin simpan jumlah like ke database
    });
  }
});

function openModal() {
  const modal = document.getElementById("uploadModal");
  if (modal) {
    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
  }
}

function closeModal() {
  const modal = document.getElementById("uploadModal");
  if (modal) {
    modal.style.display = "none";
    document.body.style.overflow = "auto";
  }
}

// Menutup modal jika klik di luar area modal
window.onclick = function (event) {
  const modal = document.getElementById("uploadModal");
  if (event.target == modal) {
    closeModal();
  }
};

// Validasi Jumlah File (Harus tepat 3)
function validateFileCount(input) {
  const display = document.getElementById("file-name-display");

  if (input.files.length !== 3) {
    alert("Peringatan: Anda harus memilih TEPAT 3 foto!");
    input.value = ""; // Reset input
    display.innerText = "";
    return false;
  }

  let fileNames = [];
  for (let i = 0; i < input.files.length; i++) {
    fileNames.push(input.files[i].name);
  }
  display.innerText = "File terpilih: " + fileNames.join(", ");
}
