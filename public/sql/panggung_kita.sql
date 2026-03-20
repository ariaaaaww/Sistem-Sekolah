-- 1. Membuat Database
USE panggung_kita;

-- 2. Tabel Utama: Deskripsi Karya
-- Menyimpan data teks utama agar tidak tertulis berulang-ulang.
CREATE TABLE deskripsi_karya (
    id_karya INT AUTO_INCREMENT PRIMARY KEY,
    judul_karya VARCHAR(150) NOT NULL,
    deskripsi_singkat TEXT,
    mata_pelajaran VARCHAR(100),
    nama_tim_pembuat VARCHAR(100),
    jumlah_anggota INT,
    tanggal_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. Tabel Foto/Lampiran (Relasi One-to-Many)
-- Jika satu karya punya lebih dari satu foto, di sinilah tempatnya.
-- Jika hanya satu foto per karya, tabel ini tetap menjaga struktur tetap rapi.
CREATE TABLE lampiran_foto (
    id_foto INT AUTO_INCREMENT PRIMARY KEY,
    id_karya INT NOT NULL,
    image_path VARCHAR(255) NOT NULL, -- Contoh: 'uploads/karya1_foto1.jpg'
    keterangan_foto VARCHAR(100),     -- Opsional: misal "Foto Tampak Depan"
    FOREIGN KEY (id_karya) REFERENCES deskripsi_karya(id_karya) ON DELETE CASCADE
);

-- 4. Tabel User Upload (Untuk Proses Moderasi)
-- Tempat user mengirimkan draf sebelum disetujui admin.
CREATE TABLE user_upload (
    id_upload INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255), 
    judul_karya VARCHAR(150),
    deskripsi_singkat TEXT,
    mata_pelajaran VARCHAR(100),
    nama_tim_pembuat VARCHAR(100),
    jumlah_anggota INT,
    status_verifikasi ENUM('pending', 'disetujui', 'ditolak') DEFAULT 'pending',
    waktu_submit TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- new
-- // Tambahkan fungsi handleLike ke file js Anda
function handleLike(btn) {
    btn.classList.toggle('active');
    if(btn.classList.contains('active')) {
        btn.innerText = "Liked ❤️";
    } else {
        btn.innerText = "Like";
    }
}

-- // Fungsi modal yang sudah ada (pastikan id sesuai)
function openModal() {
    const modal = document.getElementById("uploadModal");
    if(modal) modal.style.display = "flex";
}