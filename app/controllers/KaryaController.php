<?php
namespace App\Controllers;

class KaryaController
{
    public function index()
    {
        require_once '../app/view/karya/index.php';
    }
    public function deskripsiKarya()
    {
        require_once '../app/view/karya/deksripsi-karya.php';
    }

    public function lampiranKarya()
    {
        require_once "../app/view/karya/lampiran-karya.php";
    }

}
?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->