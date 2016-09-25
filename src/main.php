<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

require 'TKMApi.php';
require 'constants.php';
require 'Query.php';
require 'Resolver.php';
require 'functions/parse-metrics.php';
require 'functions/aggregate-result.php';
require 'FacebookResolver.php';
require 'AdwordsResolver.php';
require 'MetaData.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

function secured(\Closure $routeHandler) : callable
{
    return function (Request $request, Response $response, array $params) use ($routeHandler): Response {
        try {
            $routeHandler = $routeHandler->bindTo($this);
            return $routeHandler($request, $response, $params);
        } catch (\Throwable $e) {
            global $logger;

            $logger->warning('Report request failed', [
                'category' => 'event',
                'event' => 'report-failure',
                'request' => [
                    'body' => $request->getParsedBody(),
                    'url' => $request->getUri()->getPath()
                ],
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'stack' => $e->getTraceAsString()
                ]
            ]);

            throw $e;
        }
    };
}

require 'routes/index.php';
require 'routes/meta.php';
require 'routes/metrics.php';