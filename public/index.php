<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

//Karya
$router->add('GET', '/', 'KaryaController', 'index');
$router->add('GET', '/deksripsi-karya/', 'KaryaController', 'deskripsiKarya');
$router->add('GET', '/lampiran-karya/{id}', 'KaryaController', 'lampiranKarya');
$router->add('POST', '/prosesUpload/', 'KaryaController', 'prosesUpload');
?>