<?php
namespace App\Controllers;

class StudentController
{
    public function index()
    {
        require_once '../app/view/students/index.php';
    }
    public function create()
    {
        require_once '../app/view/students/create.php';
    }

    public function show(string $id)
    {
        require_once "../app/view/students/show.php";
    }

    public function edit(string $id)
    {
        require_once '../app/view/students/edit.php';
    }
}
?>

<!-- ../ untuk dari awal -->
<!-- .. untuk dari folder dari file -->