<?php
require_once './libs/Router.php';
require_once './app/controller/artistasController.php';

// crea el router
$router = new Router();

// defina la tabla de ruteo
$router->addRoute('artistas', 'GET', 'artistasController', 'getArtistas');
$router->addRoute('artistas/:ID', 'GET', 'artistasController', 'getArtista');
$router->addRoute('artistas', 'POST', 'artistasController', 'addArtistas'); 
$router->addRoute('artistas/:ID', 'DELETE', 'artistasController', 'deleteArtista');

//queda insertar y editar artistas. no sabemos si hay que usar las 2 tablas

// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);