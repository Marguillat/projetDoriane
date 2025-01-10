<?php

require'vendor/autoload.php';

use src\connection\DataBase;
use src\Router;
//error/exception Handler 
// set_exception_handler(function(){
//     require(__DIR__.'/src/Views/partials/metaHead.phtml');
//     require(__DIR__.'/src/Views/404.html');
// });

$router = new Router;
$db = new DataBase;

$uri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

$controllerName = $router->handleRouting($uri,$requestMethod);

$controller = new $controllerName();