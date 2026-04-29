<?php
// Koneksi ke database
include '../app/config/config.php'; 

if (isset($_POST['submit'])) {
    // Ambil data teks dari form
    $judul     = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori  = mysqli_real_escape_string($conn, $_POST['kategori']);
    $note      = mysqli_real_escape_string($conn, $_POST['note']);
    $anggota   = mysqli_real_escape_string($conn, $_POST['anggota']);

    // Konfigurasi File Gambar
    $filename = $_FILES['gambar_karya']['name'];
    $tmp_name = $_FILES['gambar_karya']['tmp_name'];
    $fileSize = $_FILES['gambar_karya']['size'];
    $error    = $_FILES['gambar_karya']['error'];

    // 1. Cek apakah ada file yang diunggah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!'); window.history.back();</script>";
        exit;
    }

    // 2. Validasi Ekstensi Gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile  = explode('.', $filename);
    $ekstensiFile  = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script>alert('Bukan file gambar! (Gunakan jpg/jpeg/png)'); window.history.back();</script>";
        exit;
    }

    // 3. Generate Nama Baru (supaya tidak tertimpa jika nama file sama)
    $namaFileBaru = uniqid() . '.' . $ekstensiFile;
    
    // 4. Tentukan Folder Tujuan
    $folderTujuan = "../../../public/asset/deksripsi/" . $namaFileBaru;

    // 5. Pindahkan File dan Simpan ke Database
    if (move_uploaded_file($tmp_name, $folderTujuan)) {
        // Query menggunakan tabel 'lampiran'
        $query = "INSERT INTO lampiran (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar, note) 
                  VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '1', '$namaFileBaru', '$note')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil disimpan!'); window.location='/deks/deksripsi-karya';</script>";
        } else {
            echo "Error Database: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah file ke server.";
    }
} else {
    // Jika akses file ini tanpa lewat form
    header("Location: /deks/deksripsi-karya");
}
?>