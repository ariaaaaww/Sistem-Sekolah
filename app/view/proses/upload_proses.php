<?php
// Koneksi ke database
include '../app/config/config.php';

if (isset($_POST['submit'])) {
    // Ambil data teks
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);
    $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);

    // Validasi apakah file diunggah & berjumlah tepat 3
    if (!isset($_FILES['gambar_karya']) || count($_FILES['gambar_karya']['name']) !== 3) {
        echo "<script>alert('Harap unggah tepat 3 foto!'); window.history.back();</script>";
        exit;
    }

    $fileNames = $_FILES['gambar_karya']['name'];
    $fileTmpNames = $_FILES['gambar_karya']['tmp_name'];
    $fileErrors = $_FILES['gambar_karya']['error'];

    $uploadedFiles = [];
    $ekstensiValid = ['jpg', 'jpeg', 'png'];

    // Proses validasi dan unggah setiap file
    for ($i = 0; $i < 3; $i++) {
        if ($fileErrors[$i] === 4) {
            echo "<script>alert('Foto ke-" . ($i + 1) . " belum dipilih!'); window.history.back();</script>";
            exit;
        }

        $ekstensiFile = explode('.', $fileNames[$i]);
        $ekstensiFile = strtolower(end($ekstensiFile));

        if (!in_array($ekstensiFile, $ekstensiValid)) {
            echo "<script>alert('Format foto ke-" . ($i + 1) . " tidak valid! Gunakan jpg, jpeg, atau png.'); window.history.back();</script>";
            exit;
        }

        // Generate nama file baru agar tidak bentrok
        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $folderTujuan = "../../../public/asset/lampiran4/" . $namaFileBaru;

        if (move_uploaded_file($fileTmpNames[$i], $folderTujuan)) {
            $uploadedFiles[] = $namaFileBaru;
        } else {
            echo "<script>alert('Gagal mengunggah foto ke-" . ($i + 1) . "'); window.history.back();</script>";
            exit;
        }
    }

    // Query ke database tabel lampiran
    $query = "INSERT INTO lampiran (judul, deskripsi, kategori, anggota, jumlah_anggota, note_tambahan, gambar_lampiran1, gambar_lampiran2, gambar_lampiran3) 
              VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '1', '$note', '$uploadedFiles[0]', '$uploadedFiles[1]', '$uploadedFiles[2]')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data dan 3 lampiran berhasil disimpan!'); window.location='/deks/deksripsi-karya';</script>";
    } else {
        echo "Error Database: " . mysqli_error($conn);
    }
} else {
    header("Location: /deks/deksripsi-karya");
    exit;
}
?>