<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Throwable;

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
        } catch (Throwable $e) {
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

function makeAccountAccessException(string $locale, Query $query, Throwable $e): array
{
    return [
        'code' => 403,

        'message' => $locale === 'pt-BR'
            ? "O accesso a conta '{$query->adAccountId}' foi perdido! O resultado do relatório provavelmente está imcompleto."
            : "We have lost access to the account '{$query->adAccountId}'! The report result is probably incomplete.",

        'account' => [
            'platform' => $query->platform,
            'tetris_account' => $query->tetrisAccountId,
            'ad_account' => $query->adAccountId
        ],

        'parentException' => [
            'code' => $e->getCode(),
            'message' => $e->getMessage()
        ]
    ];
}

function parseReportException(string $locale, Query $query, Throwable $e): array
{
    $exceptionMessage = $e->getMessage();

    $isAccountException = (
        stripos($exceptionMessage, 'permission') !== FALSE ||
        stripos($exceptionMessage, 'authentication') !== FALSE ||
        stripos($exceptionMessage, 'authorization') !== false
    );

    if ($isAccountException) {
        return makeAccountAccessException($locale, $query, $e);
    } else {
        throw $e;
    }
}

require 'routes/report.php';
require 'routes/meta-data.php';
require 'routes/cross-platform-meta-data.php';
require 'routes/cross-platform-report.php';