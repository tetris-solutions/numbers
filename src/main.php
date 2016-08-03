<?php

namespace Tetris\Numbers;

require 'database.php';
require 'TKMApi.php';
require 'constants.php';
require 'Query.php';
require 'Resolver.php';
require 'functions/parse-metrics.php';
require 'FacebookResolver.php';
require 'AdwordsResolver.php';
require 'MetaData.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

require 'routes/index.php';
require 'routes/meta.php';