<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\API\TokenManager;
use Tetris\Numbers\Report\Query\QueryBase;
use Tetris\Numbers\Utils\ArrayUtils;
use Throwable;

require 'constants.php';
require_once 'logger.php';

global $app;

$container = $app->getContainer();
$container['tkm'] = new TokenManager($app);

function secured(string $action, \Closure $routeHandler): callable
{
    return function (Request $request, Response $response, array $params) use ($action, $routeHandler): Response {
        global $logger;

        $req = [
            'body' => $request->getParsedBody(),
            'url' => $request->getUri()->getPath(),
            'search' => $request->getQueryParams(),
            'params' => $params
        ];

        try {
            $routeHandler = $routeHandler->bindTo($this);
            $result = $routeHandler($request, $response, $params);

            $logger->debug("request {$action}", ArrayUtils::flatten([
                'category' => 'action',
                'action' => $action,
                'request' => $req
            ], 20));

            return $result;
        } catch (Throwable $e) {
            $logger->warning("{$action} failure", ArrayUtils::flatten([
                'category' => 'event',
                'event' => 'report-failure',
                'request' => $req,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'stack' => $e->getTraceAsString()
                ]
            ], 20));

            throw $e;
        }
    };
}

function makeAccountAccessException(string $locale, QueryBase $query, Throwable $e): array
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

function parseReportException(string $locale, QueryBase $query, Throwable $e): array
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

require 'routes/v2/meta-data.php';
require 'routes/v2/report.php';
require 'routes/cross-platform-meta-data.php';
require 'routes/cross-platform-report.php';
