<?php
namespace App\Controllers;

class StudentController
{
    public function index()
    {
        echo '<h1>Halaman Daftar Siswa</h1>';
        echo '<p>Menampilkan daftar seluruh siswa</p>';
    }
    public function create()
    {
        echo '<h1>Tambah SIswa</h1>';
        echo '<p>Menampilkan Form Tambah Siswa</p>';
        echo '<a href="https://youtube.com/" style="text-decoration: none"> Form </a>';
    }

    public function show(string $id)
    {
        echo '<h1>Tambah SIswa</h1>';
        echo "<p>Menampilkan detail siswa ID : {$id}</p>";
    }

}
?>