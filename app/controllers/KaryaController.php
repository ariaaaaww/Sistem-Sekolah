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

    public function uploadProses()
    {
        require_once '../app/view/Upload/upload_proses.php';
    }
}


?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->