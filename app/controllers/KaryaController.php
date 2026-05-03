<?php
namespace App\Controllers;

class KaryaController
{

    public function index()
    {
        require_once "../app/view/karya/index.php"; // Sesuaikan dengan view Anda
    }

    public function deskripsiKarya()
    {
        require_once "../app/view/karya/deskripsi-karya.php";
    }

    public function lampiranKarya($id)
    {
        require_once "../app/view/karya/lampiran-karya.php";
    }

    // public function prosesUpload()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         global $conn; // Pastikan koneksi database Anda tersedia

    //         $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    //         $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    //         $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    //         $anggota = mysqli_real_escape_string($conn, $_POST['anggota']);

    //         // Gunakan path absolut dengan DOCUMENT_ROOT agar path selalu akurat
    //         $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/panggung-kita/public/asset/deksripsi/';

    //         if (!is_dir($target_dir)) {
    //             mkdir($target_dir, 0755, true);
    //         }

    //         $uploaded_files = [];
    //         $total_files = count($_FILES['gambar_karya']['name']);

    //         for ($i = 0; $i < $total_files; $i++) {
    //             $filename = $_FILES['gambar_karya']['name'][$i];
    //             $tmp_name = $_FILES['gambar_karya']['tmp_name'][$i];
    //             $target_file = $target_dir . basename($filename);

    //             if (move_uploaded_file($tmp_name, $target_file)) {
    //                 $uploaded_files[] = $filename;
    //             }
    //         }

    //         $gambar_utama = isset($uploaded_files[0]) ? $uploaded_files[0] : '';

    //         $query = "INSERT INTO karya (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar) 
    //                   VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '$total_files', '$gambar_utama')";

    //         if (mysqli_query($conn, $query)) {
    //             echo "<script>
    //                 alert('Data dan karya berhasil diunggah!');
    //                 window.location.href = '/deksripsi-karya/';
    //             </script>";
    //             exit;
    //         } else {
    //             echo "Gagal input data: " . mysqli_error($conn);
    //         }
    //     } else {
    //         // Jika diakses langsung
    //         header("Location: /deksripsi-karya/");
    //         exit;
    //     }
    // }
}
?>