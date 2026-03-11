<?php

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

$router->add('GET', '/deks', 'StudentController', 'index');
$router->add('GET', '/deks/Deksripsi_Karya', 'StudentController', 'Deksripsi_Karya');
$router->add('GET', '/deks/Lampiran_Karya', 'StudentController', 'Lampiran Karya');

$router->run();

?>