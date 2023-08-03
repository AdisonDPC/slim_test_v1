<?php

use Psr\Container\ContainerInterface,

    Slim\App,
    Slim\Views\Twig,
    Slim\Views\TwigMiddleware,

    Twig\Extension\DebugExtension,

    Illuminate\Database\Capsule\Manager;

return function (App $aApp) {

    $cContainer = $aApp -> getContainer();

    // SERVICE TWIG FOR TEMPLATES.
    
    $cContainer -> set('view', function(App $aApp, ContainerInterface $ciContainer) {

        $aConfig = $ciContainer -> get('config');

        // Create Twig
        $tTwig = Twig::create($aConfig['view']['path'], $aConfig['view']['twig']);

        $tTwig -> addExtension(new DebugExtension());

        return $tTwig;

    });
    
    // SERVICE FACTORY FOR THE DATABASE (ORM MYSQL ELOQUENT | JSON | TXT).

    $cContainer -> set('db', function(App $aApp, ContainerInterface $ciContainer) {

        $aConfig = $ciContainer -> get('config');

        $mManager = new Manager;

        if ($aConfig['db']['driver'] != 'mysql') return $aConfig['db'][$aConfig['db']['driver']];

        $mManager -> addConnection($aConfig['db'][$aConfig['db']['driver']]);

        $mManager -> setAsGlobal();
        $mManager -> bootEloquent();

        return $mManager;

    });

};
