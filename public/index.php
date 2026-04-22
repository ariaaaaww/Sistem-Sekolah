<?php

require_once '../app/core/Router.php';
use App\Core\Router;

$router = new Router();

$router->add('GET', '/student', 'StudentController', 'index');
$router->add('GET', '/student/create', 'StudentController', 'create');
$router->add('GET', '/student/{id}', 'StudentController', 'show');
$router->add('GET', '/student/{id}/edit', 'StudentController', 'edit');

$router->add('POST', '/student', 'StudentController', 'store');
$router->add('PUT', '/student/{id}', 'StudentController', 'update');
$router->add('DELETE', '/student/{id}', 'StudentController', 'destroy');

$router->run();
?>