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
        require_once '../app/view/karya/deksripsi-karya.php';
    }

    public function lampiranKarya($id)
    {
        require_once "../app/view/karya/lampiran-karya.php";
    }

    // Tambahkan method ini
    public function prosesUpload()
    {
        require_once "../app/view/Upload/upload_proses.php";
        // Logika upload yang sebelumnya kita bahas
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Contoh logic sederhana:
            $judul = $_POST['judul'];
            // ... ambil data lainnya ...

            echo "Berhasil masuk ke controller!";
            // Panggil model untuk simpan ke tabel lampiran
        }
    }

    // Method lainnya (misal detail)
    public function detail($id)
    {
        // ...
    }
}


?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->