<?php
namespace App\Controllers;

class StudentController
{
    public function index()
    {
        require_once '../view/index.php';
    }
    public function Deksripsi_Karya()


    {
        require_once '../view/Deksripsi Karya.php';
    }

    public function Lampiran_Karya()
    {
        require_once "../view/Lampiran Karya.php";
    }

}
?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->