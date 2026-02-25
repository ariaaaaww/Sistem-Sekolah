<?php
namespace App\Controllers;

class StudentController
{
    public function index()
    {
        require_once '../view/students/index.php';
        // require_once '..view/students/index.php';
    }
    public function create()
    {
        require_once '../view/students/create.php';
        // require_once '..view/students/create.php';
    }

    public function show(string $id)
    {
        require_once "../view/students/show.php";
        // require_once '..view/students/show.php';
    }

}
?>

<!-- ./ untuk dari awal -->
<!-- .. untuk dari folder dari file -->