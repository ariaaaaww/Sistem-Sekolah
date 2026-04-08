<?php
namespace App\Core;

class Controller
{
    public function view(string $view, array $data = [])
    {
        extract($data);
        $view = str_replace('.', '/', $view);

        $content = "../app/view/{$view}.php";
        require_once "../app/view/layout/app.php";
    }
}
?>