<?php

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

//Karya
$router->add('GET', '/', 'KaryaController', 'index');
$router->add('GET', '/deksripsi-karya/', 'KaryaController', 'deskripsiKarya');
// $router->add('GET', '/lampiran-karya', 'KaryaController', 'lampiranKarya');
$router->add('GET', '/lampiran-karya/{id}', 'KaryaController', 'lampiranKarya');
$router->add('GET', '/prosesUpload/', 'KaryaController', 'prosesUpload');

$router->run();

?>