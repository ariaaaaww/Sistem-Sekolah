<?php
// Pastikan path ke file config.php sesuai dengan struktur folder Anda
include '../app/config/config.php';

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);
    
    // Mengambil nilai note jika ada di form
    $note = isset($_POST['note']) ? mysqli_real_escape_string($conn, $_POST['note']) : '';

    // Konfigurasi Upload Gambar
    $target_dir = "../../../public/asset/deksripsi/";

    // Buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $uploaded_files = [];
    $total_files = count($_FILES['gambar_karya']['name']);

    // Lakukan perulangan untuk memproses file yang diupload (multiple)
    for ($i = 0; $i < $total_files; $i++) {
        $filename = $_FILES['gambar_karya']['name'][$i];
        $tmp_name = $_FILES['gambar_karya']['tmp_name'][$i];
        $target_file = $target_dir . basename($filename);

        if (move_uploaded_file($tmp_name, $target_file)) {
            $uploaded_files[] = $filename;
        }
    }

    // Ambil file pertama untuk dijadikan thumbnail atau simpan ke database
    $gambar_utama = isset($uploaded_files[0]) ? $uploaded_files[0] : '';

    // Query Insert ke Database
    $query = "INSERT INTO karya (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar) 
              VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '$total_files', '$gambar_utama')";

    if (mysqli_query($conn, $query)) {
        // Berhasil, redirect ke halaman deskripsi-karya menggunakan JavaScript
        echo "<script>
            alert('Data dan karya berhasil diunggah!');
            window.location.href = '/deksripsi-karya/';
        </script>";
        exit;
    } else {
        echo "Gagal input data: " . mysqli_error($conn);
    }
} else {
    // Jika diakses tanpa menekan tombol submit
    header("Location: /deksripsi-karya/");
    exit;
}
?>