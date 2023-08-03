<?php

use Psr\Container\ContainerInterface,

    Slim\App,

    Slim\Views\TwigMiddleware;

return function (App $aApp) {

    // Parse json, form data and xml.
    $aApp -> addBodyParsingMiddleware();

    // Add the Slim built-in routing middleware.
    $aApp -> addRoutingMiddleware();

    // Handle exceptions.
    $aApp -> addErrorMiddleware(true, true, true);

    // Twig.
    $aApp -> add(TwigMiddleware::createFromContainer($aApp));

    // BEGIN - APP MIDDLEWARE.

    $cContainer = $aApp -> getContainer();

    $cContainer -> set('DB_Middleware', function(App $aApp, ContainerInterface $ciContainer) {

        return new \Middleware\DB_Middleware($ciContainer);

    });

    $cContainer -> set('Before_Middleware', function(App $aApp, ContainerInterface $ciContainer) {

        return new \Middleware\Before_Middleware($ciContainer);

    });

    $cContainer -> set('After_Middleware', function(App $aApp, ContainerInterface $ciContainer) {

        return new \Middleware\After_Middleware($ciContainer);

    });

    // END - APP MIDDLEWARE.

};
