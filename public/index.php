<?php

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

//Karya
$router->add('GET', '/deks', 'Karya', 'index');
$router->add('GET', '/deks/deksripsi-karya', 'Karya', 'Deksripsi_Karya');
$router->add('GET', '/deks/lampiran-karya', 'Karya', 'Lampiran Karya');

$router->run();

?>