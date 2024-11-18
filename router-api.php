<?php
require_once 'libs/router.php';
require_once 'app/controllers/auto.api.controller.php';
require_once 'app/controllers/marca.api.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
#                 endpoint      verbo       controller                  método
$router->addRoute('autos',      'GET',      'CarApiController',         'getAll');
$router->addRoute('autosOp',    'GET',      'CarApiController',         'getAllCarsOP');
$router->addRoute('autos',      'POST',     'CarApiController',         'create');
$router->addRoute('auto/:id',   'GET',      'CarApiController',         'get');
$router->addRoute('auto/:id',   'DELETE',   'CarApiController',         'delete');
$router->addRoute('auto/:id',   'PUT',      'CarApiController',         'update');

$router->addRoute('marcas',     'GET',      'MarcaApiController',       'getAll');
$router->addRoute('marcasOp',   'GET',      'MarcaApiController',       'getAllBrandsOP');
$router->addRoute('marcas',     'POST',     'MarcaApiController',       'create');
$router->addRoute('marca/:id',  'GET',      'MarcaApiController',       'get');
$router->addRoute('marca/:id',  'DELETE',   'MarcaApiController',       'delete');
$router->addRoute('marca/:id',  'PUT',      'MarcaApiController',       'update');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
