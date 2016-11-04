<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;

require 'TKMApi.php';
require 'constants.php';
require 'Report.php';
require 'Query.php';
require 'Resolver.php';
require 'ResultParser.php';
require 'FacebookResolver.php';
require 'AdwordsResolver.php';
require 'MetaData.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

function uniq(array $s): array
{
    return array_values(array_unique($s));
}

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
require 'routes/x-meta.php';
require 'routes/x.php';