<?php

namespace Tetris\Numbers;

require 'database.php';
require 'TKMApi.php';
require 'constants.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

