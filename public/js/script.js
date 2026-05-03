// 1. Fungsi untuk Membuka Modal Upload
function openModal() {
  const modal = document.getElementById("uploadModal");
  modal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// 2. Fungsi untuk Menutup Modal
function closeModal() {
  const modal = document.getElementById("uploadModal");
  modal.style.display = "none";
  document.body.style.overflow = "auto";
}

// 3. Menutup modal jika user klik di luar area box putih
window.onclick = function (event) {
  const modal = document.getElementById("uploadModal");
  if (event.target == modal) {
    closeModal();
  }
};

// 4. Validasi File (Harus 3 dan harus gambar)
function validateFiles(input) {
  const files = input.files;
  const display = document.getElementById("file-name-display");

  if (files.length !== 3) {
    alert("Anda harus memilih tepat 3 foto.");
    input.value = "";
    display.textContent = "";
    return;
  }

  for (let i = 0; i < files.length; i++) {
    if (!files[i].type.startsWith("image/")) {
      alert("Hanya file berupa foto/gambar yang diperbolehkan.");
      input.value = "";
      display.textContent = "";
      return;
    }
  }

  let fileNames = [];
  for (let i = 0; i < files.length; i++) {
    fileNames = fileNames.push(files[i].name);
  }
  display.textContent = "File terpilih: " + fileNames.join(", ");
}

function validateFiles(input) {
  const fileNameDisplay = document.getElementById("file-name-display");
  const files = input.files;

  if (files.length !== 3) {
    fileNameDisplay.textContent = "";
    alert("Anda harus memilih tepat 3 foto!");
    input.value = ""; // Reset input
  } else {
    fileNameDisplay.textContent = `File terpilih: ${files[0].name}, ${files[1].name}, ${files[2].name}`;
  }
}
