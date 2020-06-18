<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../app/Controllers/MainController.php';

$currentPage = isset($_GET['page']) ? $_GET['page'] : '/home';
// Instanciation de l'altoRouter
$router = new AltoRouter();

// Création de routes dynamiques
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => 'MainController'
    ],

);

$router->map(
    'GET',
    '/creator',
    [
        'method' => 'creator',
        'controller' => 'MainController',
    ]
    );

    // Si la route est définie dans mon tableau de routage
$match = $router->match();

if ($match) {
    $controller = 'MainController'.$match['target']['controller'];
    $controllerObj = new $controller();

    $method = $match['target']['method'];

    $params = $match['params'];

    $controllerObj->$method($params);
} else {
    // Sinon 404 
    $controllerObj = new MainController();
    $controllerObj->page404();
}