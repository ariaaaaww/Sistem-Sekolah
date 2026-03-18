<?php

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

//Karya
$router->add('GET', '/deks', 'KaryaController', 'index');
$router->add('GET', '/deks/deksripsi-karya', 'KaryaController', 'deskripsiKarya');
$router->add('GET', '/deks/lampiran-karya', 'KaryaController', 'lampiranKarya');

$router->run();

?>