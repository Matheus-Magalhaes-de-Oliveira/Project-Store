<?php

require './vendor/autoload.php';

date_default_timezone_set("America/Sao_Paulo");

$router = new \App\Router\Routing;
\App\Config\Router::configRouters($router);
$router->run();
?>