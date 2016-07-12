<?php

namespace Tetris\Numbers;

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

return [
    'environments' => [
        'default_database' => 'production',
        'production' => [
            'name' => 'numbers',
            'adapter' => 'pgsql',
            'host' => getenv('NUMBERS_DB_HOST'),
            'user' => getenv('NUMBERS_DB_USER'),
            'pass' => getenv('NUMBERS_DB_PWD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci'
        ]
    ],
    'paths' => [
        'migrations' => __DIR__ . '/migrations',
        'seeds' => __DIR__ . '/seeds'
    ]
];
