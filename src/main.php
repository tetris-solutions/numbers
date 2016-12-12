<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Throwable;

require 'constants.php';
require 'classes/TKMApi.php';
require 'classes/QueryBlueprint.php';
require 'classes/CrossPlatformReport.php';
require 'classes/Report.php';
require 'classes/Query.php';
require 'classes/Resolver.php';
require 'classes/ResultParser.php';
require 'classes/FacebookResolver.php';
require 'classes/AdwordsResolver.php';
require 'classes/MetaData.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TKMApi($app);

function uniq(array $s): array
{
    return array_values(array_unique($s));
}

function secured(\Closure $routeHandler): callable
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
                'request_' . time() => [
                    'body' => $request->getParsedBody(),
                    'url' => $request->getUri()->getPath()
                ],
                'error_' . time() => [
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