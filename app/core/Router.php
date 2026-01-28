<?php
namespace App\Core;

use app\Controller\StudentController;

class Router
{

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if ($method == 'GET' && $uri == '/student') {
            // echo '<h1>Daftar Siswa</h1>';
            // echo '<p>Menampilkan daftar siswa</p>';
            // return;

            require_once './app/controller/StudentController.php';
            $controller = new StudentController();
            $controller->index();
            return;
        }
        // if ($method == 'GET' && $uri == '/student/create') {
        //     echo '<h1>Tambah Siswa</h1>';
        //     echo '<p>Menampilkan form tambah siswa</p>';
        //     echo '<form>';
        //     return;
        // }

        if ($method == 'GET' && $uri == '/student/create') {
            require_once './app/controller/StudentController.php';
            $controller = new StudentController();
            $controller->create();
            return;
        }

        http_response_code(404);
        echo '404 - Not Found Page';

    }
}

?>