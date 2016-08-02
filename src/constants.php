<?php

use Tetris\Adwords\Client as Adwords;

define('TZ_DATE_FORMAT', 'c');
define('ADWORDS_DEVELOPER_TOKEN', getenv('ADWORDS_DEVELOPER_TOKEN'));
define('ADWORDS_CLIENT_ID', getenv('ADWORDS_CLIENT_ID'));
define('ADWORDS_CLIENT_SECRET', getenv('ADWORDS_CLIENT_SECRET'));
define('AVAILABLE_LOCALES', ['en', 'pt-BR']);

Adwords::setup([
    'DEVELOPER_TOKEN' => ADWORDS_DEVELOPER_TOKEN,
    'CLIENT_ID' => ADWORDS_CLIENT_ID,
    'CLIENT_SECRET' => ADWORDS_CLIENT_SECRET,
    'GOOGLEADS_LIB_UTILS_DIR' => __DIR__ . '/../vendor/googleads/googleads-php-lib/src/Google/Api/Ads/AdWords/Util/v201605'
]);