<?php
namespace App\Controllers;

class KaryaController
{
    protected $connection;

    public function index()
    {
        require_once '../app/view/karya/index.php';
    }

    public function deskripsiKarya()
    {
        // 1. Koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "panggung_kita");
        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // 2. Ambil data lampiran terbaru (atau berdasarkan id) untuk ditampilkan
        $query = "SELECT * FROM lampiran ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $lampiran = mysqli_fetch_assoc($result);

        mysqli_close($conn);

        // 3. Panggil view dengan membawa variabel $lampiran
        require_once '../app/view/karya/deksripsi-karya.php';
    }

    public function lampiranKarya($id)
    {
        require_once "../app/view/karya/lampiran-karya.php";
    }

    public function uploadProses()
    {
        if (isset($_POST['submit'])) {
            $judul = $_POST['judul'];
            $deskripsi = $_POST['deskripsi'];
            $kategori = $_POST['kategori'];
            $anggota = $_POST['anggota'];

            // 1. Validasi jumlah file harus tepat 3
            if (!isset($_FILES['gambar_karya']) || count($_FILES['gambar_karya']['name']) !== 3) {
                echo "<script>alert('Harap unggah tepat 3 foto!'); window.history.back();</script>";
                exit;
            }

            $fileNames = $_FILES['gambar_karya']['name'];
            $fileTmpNames = $_FILES['gambar_karya']['tmp_name'];
            $fileErrors = $_FILES['gambar_karya']['error'];

            $uploadedFiles = [];
            $ekstensiValid = ['jpg', 'jpeg', 'png'];

            // 2. Proses validasi dan upload setiap file
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

                // Buat nama file baru agar unik dan tidak bentrok
                $namaFileBaru = uniqid() . '.' . $ekstensiFile;
                $folderTujuan = "../public/asset/lampiran4/" . $namaFileBaru;

                if (move_uploaded_file($fileTmpNames[$i], $folderTujuan)) {
                    $uploadedFiles[] = $namaFileBaru;
                } else {
                    echo "<script>alert('Gagal mengunggah foto ke-" . ($i + 1) . "'); window.history.back();</script>";
                    exit;
                }
            }

            // 3. Masukkan ke database 
            // Sesuaikan koneksi database sesuai dengan konfigurasi proyek Anda
            $conn = mysqli_connect("localhost", "root", "", "panggung_kita");
            if (!$conn) {
                die("Koneksi database gagal: " . mysqli_connect_error());
            }

            $judul = mysqli_real_escape_string($conn, $judul);
            $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
            $kategori = mysqli_real_escape_string($conn, $kategori);
            $anggota = mysqli_real_escape_string($conn, $anggota);

            $file1 = $uploadedFiles[0];
            $file2 = $uploadedFiles[1];
            $file3 = $uploadedFiles[2];

            $query = "INSERT INTO lampiran (judul, deskripsi, kategori, anggota, jumlah_anggota, gambar_lampiran1, gambar_lampiran2, gambar_lampiran3) 
                      VALUES ('$judul', '$deskripsi', '$kategori', '$anggota', '1', '$file1', '$file2', '$file3')";

            if (mysqli_query($conn, $query)) {
                mysqli_close($conn);
                echo "<script>alert('Data dan 3 lampiran berhasil disimpan!'); window.location='/deksripsi-karya/';</script>";
                exit;
            } else {
                echo "Error Database: " . mysqli_error($conn);
            }

            mysqli_close($conn);
            exit;
        } else {
            header("Location: /deksripsi-karya/");
            exit;
        }
    }
}