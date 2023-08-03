<?php

// Should be set to 0 in production.
error_reporting(E_ALL);

// Should be set to '0' in production.
ini_set('display_errors', '1');

// Settings.
$aSettings = [

    'view' => [
        'path' => __DIR__ . '/../src/views',
        'twig' => [ 'cache' => false ]
    ],
    'db' => [
        'driver' => 'mysql',
        'mysql' => [
            'driver' => 'mysql',
            'host' => '192.168.1.111:3344',
            'database' => 'db_test',
            'username' => 'testuser',
            'password' => 'testuser@docker',
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_spanish2_ci',
            'prefix'    => ''
        ],
        'json' => [
            'driver' => 'json',
            'filename' => 'pokemons.json',
            'path' => __DIR__ . '/../database'
        ],
        'txt' => [
            'driver' => 'txt',
            'filename' => 'phrases.txt',
            'path' => __DIR__ . '/../database'
        ]
    ]

];

// ...

return $aSettings;
