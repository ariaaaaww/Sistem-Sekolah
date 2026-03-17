<?php
namespace App\Controllers;

class Karya
{
    public function index()
    {
        require_once '../app/view/karya/index.php';
    }
    public function Deksripsi_Karya()
    {
        require_once '../app/view/karya/deksripsi-karya.php';
    }

    public function Lampiran_Karya()
    {
        require_once "../app/view/karya/lampiran-karya.php";
    }

}
?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->