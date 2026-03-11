<?php
namespace App\Controllers;

class StudentController
{
    public function index()
    {
        require_once '../app/view/index.php';
    }
    public function Deksripsi_Karya()
    {
        require_once '../app/view/Deksripsi Karya.php';
    }

    public function Lampiran_Karya()
    {
        require_once "../app/view/Lampiran Karya.php";
    }

}
?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->