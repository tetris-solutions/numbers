<?php

namespace Tetris\Numbers;

use Dotenv\Dotenv;
use Tetris\Slimmest;

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

// load environment variables from .env
$dotenv = new Dotenv(__DIR__ . '/..');
$dotenv->load();

require __DIR__ . '/cors-allow-origin.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';

/**
 * @global
 * @var Slimmest $app
 */
$GLOBALS['app'] = $app = new Slimmest($settings);


// Register routes
require __DIR__ . '/../src/main.php';

// Run app
$app->run();
