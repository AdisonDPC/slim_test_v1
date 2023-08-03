<?php

use Psr\Container\ContainerInterface, 

    Slim\App, 
    Slim\Factory\AppFactory;

return [

    'config' => function () {
        return require __DIR__ . '/../config/app.php';
    },

    App::class => function (ContainerInterface $ciContainer) {

        AppFactory::setContainer($ciContainer);

        return AppFactory::create();

    }

];
