<?php

require_once './app/core/Router.php';
use App\Core\Router;

$router = new Router();

$router->add('GET', '/deks', 'Student', 'index');
$router->add('GET', '/deks/Deksripsi_Karya', 'Student', 'Deksripsi_Karya');
$router->add('GET', '/deks/Lampiran_Karya', 'Student', 'Lampiran Karya');

$router->run();

?>